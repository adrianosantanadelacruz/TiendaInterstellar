<?php
session_start();
require_once "../config/config.php";

// Solo clientes logueados pueden finalizar pedido
if (!isset($_SESSION["id_cliente"])) {
    header("Location: login.php");
    exit();
}

// Si el carrito está vacío → volver
if (empty($_SESSION["carrito"])) {
    header("Location: carrito.php");
    exit();
}

// Calcular total
$total_general = 0;
foreach ($_SESSION["carrito"] as $item) {
    $precio = floatval($item["precio"]);
    $cantidad = intval($item["cantidad"]);
    $total_general += $precio * $cantidad;
}

// Insertar pedido
$stmt = $conn->prepare("
    INSERT INTO PEDIDO (id_cliente, fecha, estado, total, fecha_real_entrega, fecha_estimada_entrega)
    VALUES (?, NOW(), 'pendiente', ?, NULL, NULL)
");

$id_cliente = intval($_SESSION["id_cliente"]);
$stmt->bind_param("id", $id_cliente, $total_general);
$stmt->execute();

$id_pedido = $conn->insert_id;

// Insertar detalles
$stmt_det = $conn->prepare("
    INSERT INTO DETALLE_PEDIDO (id_pedido, id_producto, cantidad, precio_unitario)
    VALUES (?, ?, ?, ?)
");

foreach ($_SESSION["carrito"] as $item) {
    $id_producto = intval($item["id"]);
    $cantidad = intval($item["cantidad"]);
    $precio_unitario = floatval($item["precio"]);

    $stmt_det->bind_param("iiid", $id_pedido, $id_producto, $cantidad, $precio_unitario);
    $stmt_det->execute();
}

// ========================================================
// 🚀 GENERAR PUNTOS (HISTORIAL_PUNTOS)
// ========================================================
$puntos_ganados = floor($total_general); // 1 punto por cada 1€

$tipo_movimiento = "Suma por compra";

$stmt_puntos = $conn->prepare("
    INSERT INTO HISTORIAL_PUNTOS (fecha, tipo, id_pedido)
    VALUES (NOW(), ?, ?)
");
$stmt_puntos->bind_param("si", $tipo_movimiento, $id_pedido);
$stmt_puntos->execute();

// Actualizar saldo total del cliente
$stmt_update = $conn->prepare("
    UPDATE CLIENTE
    SET puntos_acumulados = puntos_acumulados + ?
    WHERE id_cliente = ?
");
$stmt_update->bind_param("ii", $puntos_ganados, $id_cliente);
$stmt_update->execute();

// ========================================================

// Vaciar carrito
unset($_SESSION["carrito"]);

// Mensaje opcional
$_SESSION["mensaje_pedido"] = "Pedido realizado con éxito. ID: $id_pedido";

// Redirigir a confirmación
header("Location: pedido_confirmado.php?id=" . $id_pedido);
exit();

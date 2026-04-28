<?php
session_start();
require_once "../config/config.php";

if (!isset($_SESSION["id_cliente"])) {
    header("Location: login.php");
    exit();
}

// Si el carrito está vacío, volver
if (!isset($_SESSION["carrito"]) || empty($_SESSION["carrito"])) {
    header("Location: carrito.php");
    exit();
}

// Calcular total
$total_general = 0;
foreach ($_SESSION["carrito"] as $item) {
    $total_general += $item["precio"] * $item["cantidad"];
}

// Insertar pedido
$sql = $conn->prepare("
    INSERT INTO PEDIDO (id_cliente, fecha, estado, total, fecha_real_entrega, fecha_estimada_entrega)
    VALUES (?, NOW(), 'pendiente', ?, NULL, NULL)
");

$id_cliente = $_SESSION["id_cliente"]; 
$sql->bind_param("id", $id_cliente, $total_general);
$sql->execute();

$id_pedido = $conn->insert_id;

// Insertar detalles
foreach ($_SESSION["carrito"] as $item) {
    $sql_det = $conn->prepare("
        INSERT INTO DETALLE_PEDIDO (id_pedido, id_producto, cantidad, precio_unitario)
        VALUES (?, ?, ?, ?)
    ");
    $sql_det->bind_param("iiid", $id_pedido, $item["id"], $item["cantidad"], $item["precio"]);
    $sql_det->execute();
}

// ========================================================
// 🚀 NUEVA LÓGICA: GENERAR PUNTOS (Tabla HISTORIAL_PUNTOS)
// ========================================================
$puntos_ganados = floor($total_general); // 1 punto por cada 1€

// 1. Insertamos el movimiento en el historial
$tipo_movimiento = "Suma por compra";
$sql_puntos = $conn->prepare("
    INSERT INTO HISTORIAL_PUNTOS (fecha, tipo, id_pedido) 
    VALUES (NOW(), ?, ?)
");
$sql_puntos->bind_param("si", $tipo_movimiento, $id_pedido);
$sql_puntos->execute();

// 2. Actualizamos el saldo total en la ficha del cliente
$sql_update_cliente = $conn->prepare("
    UPDATE CLIENTE 
    SET puntos_acumulados = puntos_acumulados + ? 
    WHERE id_cliente = ?
");
$sql_update_cliente->bind_param("ii", $puntos_ganados, $id_cliente);
$sql_update_cliente->execute();
// ========================================================

// Vaciar carrito
unset($_SESSION["carrito"]);

$_SESSION["mensaje_pedido"] = "Pedido realizado con éxito. ID: $id_pedido";

header("Location: pedido_confirmado.php?id=" . $id_pedido);
exit();
?>
<?php
session_start();
require_once __DIR__ . "/../config/config.php";

// Solo procesamos si viene por POST y hay carrito
if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_SESSION["carrito"])) {

    // 1. Datos del formulario
    $nombre = trim($_POST['nombre'] ?? 'Invitado');
    $email = trim($_POST['email'] ?? '');
    $direccion = trim($_POST['direccion'] ?? '');

    // 2. Calcular total real
    $total = 0;
    foreach ($_SESSION["carrito"] as $item) {
        $total += floatval($item['precio']) * intval($item['cantidad']);
    }

    // 3. Insertar pedido (cliente NULL)
    $stmt = $conn->prepare("
        INSERT INTO pedido (id_cliente, fecha, total, estado, nombre_invitado, email_invitado, direccion_invitado)
        VALUES (NULL, NOW(), ?, 'Pendiente', ?, ?, ?)
    ");

    $stmt->bind_param("dsss", $total, $nombre, $email, $direccion);

    if ($stmt->execute()) {

        $id_pedido = $conn->insert_id;

        // 4. Insertar detalles
        $stmt_detalle = $conn->prepare("
            INSERT INTO detalle_pedido (id_pedido, id_producto, cantidad, precio_unitario)
            VALUES (?, ?, ?, ?)
        ");

        foreach ($_SESSION["carrito"] as $id_producto => $item) {
            $precio = floatval($item['precio']);
            $cantidad = intval($item['cantidad']);
            $stmt_detalle->bind_param("iiid", $id_pedido, $id_producto, $cantidad, $precio);
            $stmt_detalle->execute();
        }

        // 5. Vaciar carrito
        unset($_SESSION["carrito"]);

        // 6. Redirigir a confirmación
        header("Location: pedido_confirmado.php?id=" . $id_pedido);
        exit();

    } else {
        echo "Error en los sistemas de navegación: " . $conn->error;
    }

} else {
    header("Location: index.php");
    exit();
}

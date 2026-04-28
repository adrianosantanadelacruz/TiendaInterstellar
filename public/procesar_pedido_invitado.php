<?php
session_start();
require_once __DIR__ . "/../config/config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_SESSION["carrito"])) {
    // 1. Recogemos los datos del formulario de invitado
    $nombre = $_POST['nombre'] ?? 'Invitado';
    $email = $_POST['email'] ?? '';
    $direccion = $_POST['direccion'] ?? '';
    $total = 0;

    // Calculamos el total real antes de insertar
    foreach ($_SESSION["carrito"] as $item) {
        $total += $item['precio'] * $item['cantidad'];
    }

    // 2. Insertamos el PEDIDO
    // Importante: id_cliente se envía como NULL
    $stmt = $conn->prepare("INSERT INTO pedido (id_cliente, fecha, total, estado) VALUES (NULL, NOW(), ?, 'Pendiente')");
    $stmt->bind_param("d", $total);
    
    if ($stmt->execute()) {
        $id_pedido = $conn->insert_id;

        // 3. Insertamos los DETALLES del pedido
        $stmt_detalle = $conn->prepare("INSERT INTO detalle_pedido (id_pedido, id_producto, cantidad, precio_unitario) VALUES (?, ?, ?, ?)");
        
        foreach ($_SESSION["carrito"] as $id_producto => $item) {
            $stmt_detalle->bind_param("iiid", $id_pedido, $id_producto, $item['cantidad'], $item['precio']);
            $stmt_detalle->execute();
        }

        // 4. Limpiamos la bodega de carga (carrito)
        unset($_SESSION["carrito"]);

        // 5. Éxito: Vamos a la página de confirmación
        header("Location: pedido_confirmado.php?id=" . $id_pedido);
        exit();
    } else {
        echo "Error en los sistemas de navegación: " . $conn->error;
    }
} else {
    header("Location: index.php");
    exit();
}
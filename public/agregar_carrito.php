<?php
require_once __DIR__ . "/../config/config.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $id = intval($_POST["id"]);
    $cantidad = isset($_POST["cantidad"]) ? intval($_POST["cantidad"]) : 1;

    // Buscamos el producto en la base de datos
    $sql = $conn->prepare("SELECT id_producto, nombre, precio FROM producto WHERE id_producto = ?");
    $sql->bind_param("i", $id);
    $sql->execute();
    $resultado = $sql->get_result();

    if ($resultado->num_rows === 1) {
        $producto = $resultado->fetch_assoc();
        
        // Si el precio en la BD es 0 o no existe, usamos 99.99 como respaldo
        $precio_real = ($producto['precio'] > 0) ? floatval($producto['precio']) : 99.99;

        if (!isset($_SESSION["carrito"])) {
            $_SESSION["carrito"] = [];
        }

        if (isset($_SESSION["carrito"][$id])) {
            $_SESSION["carrito"][$id]["cantidad"] += $cantidad;
        } else {
            $_SESSION["carrito"][$id] = [
                "id" => $producto["id_producto"],
                "nombre" => $producto["nombre"],
                "precio" => $precio_real,
                "cantidad" => $cantidad
            ];
        }
        $_SESSION["mensaje_carrito"] = "Añadido: " . $producto["nombre"];
    } // Aquí cierra el if de num_rows === 1
} // Aquí cierra el if de REQUEST_METHOD == POST

// Redirección final
header("Location: productos.php");
exit();
?>
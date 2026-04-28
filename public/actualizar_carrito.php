<?php
require_once __DIR__ . "/../config/config.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $id = intval($_POST["id"]);
    $cantidad = isset($_POST["cantidad"]) ? intval($_POST["cantidad"]) : 1;

    // BUSCAMOS EL PRECIO REAL EN LA BASE DE DATOS
    $sql = $conn->prepare("SELECT id_producto, nombre, precio FROM producto WHERE id_producto = ?");
    $sql->bind_param("i", $id);
    $sql->execute();
    $resultado = $sql->get_result();

    if ($resultado->num_rows === 1) {
        $producto = $resultado->fetch_assoc();
        
        // Obtenemos el precio de la columna 'precio' de tu tabla
        $precio_real = floatval($producto['precio']); 

        if (!isset($_SESSION["carrito"])) {
            $_SESSION["carrito"] = [];
        }

        // Si ya existe en el carrito, sumamos la cantidad
        if (isset($_SESSION["carrito"][$id])) {
            $_SESSION["carrito"][$id]["cantidad"] += $cantidad;
        } else {
            // Si es nuevo, guardamos los datos REALES
            $_SESSION["carrito"][$id] = [
                "id" => $producto["id_producto"],
                "nombre" => $producto["nombre"],
                "precio" => $precio_real, 
                "cantidad" => $cantidad
            ];
        }
        $_SESSION["mensaje_carrito"] = "Añadido: " . $producto["nombre"];
    }
}

header("Location: productos.php");
exit();
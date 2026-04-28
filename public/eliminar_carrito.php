<?php
require_once __DIR__ . "/../config/config.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$id = intval($_GET["id"] ?? 0);

if ($id > 0 && isset($_SESSION["carrito"][$id])) {
    unset($_SESSION["carrito"][$id]);
}

header("Location: carrito.php");
exit();

<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$host = "localhost";
$db   = "tienda_interstellar";
$user = "root";
$pass = ""; // en XAMPP SIEMPRE va vacío

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");
?>

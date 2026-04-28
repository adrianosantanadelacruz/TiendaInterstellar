<?php
require_once "../config/config.php";

if (!isset($_SESSION["id_cliente"])) {
    header("Location: login.php");
    exit();
}
require_once "../includes/header.php";
require_once "../includes/navbar.php";
?>

<main class="pedido-page">
    <h2>Resumen de pedido</h2>
    <p>En esta página mostraremos el contenido del pedido/carrito.</p>
</main>

<?php
require_once "../includes/footer.php";
?>

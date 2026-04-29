<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . "/../includes/header.php";
require_once __DIR__ . "/../includes/navbar.php";

$id_pedido = "SIN ID";

if (isset($_GET['id'])) {
    $id_pedido = intval($_GET['id']);
}

if ($id_pedido === 0) {
    $id_pedido = "NO DETECTADO";
}
?>

<main class="capsula-estelar pedido-confirmado">

    <div class="icono-check">✔</div>

    <h2>Misión Completada</h2>

    <p class="mensaje-exito">
        Tu pedido ha sido procesado correctamente.
    </p>
    
    <div class="tracking-box">
        <p class="tracking-label">ID de Seguimiento</p>
        <h3 class="tracking-id">#<?= $id_pedido ?></h3>
    </div>

    <?php if (isset($_SESSION["id_cliente"])): ?>
        <div class="mensaje-puntos">
            ⭐ ¡Has ganado puntos de reputación estelar con esta misión!
        </div>
    <?php else: ?>
        <div class="mensaje-puntos"></div>
    <?php endif; ?>

    <p class="mensaje-final">
        Los suministros están en camino. Revisa tu terminal de comunicaciones para actualizaciones.
    </p>

    <a href="index.php" class="btn-neon">Volver a la Base</a>

</main>

<?php require_once __DIR__ . "/../includes/footer.php"; ?>

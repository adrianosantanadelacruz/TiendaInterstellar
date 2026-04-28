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

<main class="capsula-estelar" style="max-width: 600px;">
    <div style="font-size: 5rem; color: #00eaff; text-shadow: 0 0 20px #00eaff; margin-bottom: 20px;">
        ✔
    </div>

    <h2>Misión Completada</h2>
    <p style="font-size: 1.2rem; margin-bottom: 20px;">
        Tu pedido ha sido procesado correctamente.
    </p>
    
    <div style="background: rgba(0, 234, 255, 0.1); border: 1px solid #00eaff; padding: 25px; border-radius: 10px; margin-bottom: 10px;">
        <p style="text-transform: uppercase; letter-spacing: 2px; font-size: 0.8rem; margin-bottom: 5px; opacity: 0.7;">
            ID de Seguimiento
        </p>
        <h3 style="font-size: 2.5rem; color: #00eaff; font-family: 'Orbitron'; margin: 0;">
            #<?php echo $id_pedido; ?>
        </h3>
    </div>

    <?php if (isset($_SESSION["id_cliente"])): ?>
        <div style="margin-bottom: 30px; color: #ffcc00; font-family: 'Orbitron'; font-size: 0.85rem; text-shadow: 0 0 10px rgba(255, 204, 0, 0.5);">
            ⭐ ¡Has ganado puntos de reputación estelar con esta misión!
        </div>
    <?php else: ?>
        <div style="margin-bottom: 30px;"></div> <?php endif; ?>
    <p style="margin-bottom: 30px; opacity: 0.8; line-height: 1.6;">
        Los suministros están en camino. Revisa tu terminal de comunicaciones para actualizaciones.
    </p>

    <a href="index.php" class="btn-neon">Volver a la Base</a>
</main>

<?php require_once __DIR__ . "/../includes/footer.php"; ?>
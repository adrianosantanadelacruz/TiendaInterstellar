<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Si ya está logueado → va directo a finalizar pedido
if (isset($_SESSION["id_cliente"])) {
    header("Location: finalizar_pedido.php");
    exit();
}

require_once __DIR__ . "/../includes/header.php";
require_once __DIR__ . "/../includes/navbar.php";
?>

<main class="capsula-estelar checkout-opciones">
    <h2>Finalizar Pedido</h2>
    <p class="checkout-subtitulo">¿Cómo deseas proceder con la adquisición de tus suministros?</p>

    <div class="checkout-grid">
        
        <section class="checkout-bloque">
            <h3 class="checkout-titulo-azul">Ya soy Tripulante</h3>
            <p>Inicia sesión para usar tus datos guardados.</p>
            <a href="login.php" class="btn-neon btn-full">Iniciar Sesión</a>
        </section>

        <section class="checkout-bloque">
            <h3 class="checkout-titulo-blanco">Invitado Civil</h3>
            <p>Continúa sin registrarte en la base de datos.</p>
            <a href="datos_envio_invitado.php" class="btn-neon btn-full btn-invitado">Comprar como Invitado</a>
        </section>

    </div>
</main>

<?php require_once __DIR__ . "/../includes/footer.php"; ?>

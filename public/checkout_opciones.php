<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 🛡️ ESCÁNER DE TRIPULANTE:
// Si el id_cliente ya existe en la sesión, saltamos directamente al proceso de finalizar
if (isset($_SESSION["id_cliente"])) {
    header("Location: finalizar_pedido.php"); 
    exit();
}

require_once __DIR__ . "/../includes/header.php";
require_once __DIR__ . "/../includes/navbar.php";
?>

<main class="capsula-estelar" style="max-width: 900px;">
    <h2>Finalizar Pedido</h2>
    <p style="margin-bottom: 40px;">¿Cómo deseas proceder con la adquisición de tus suministros?</p>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px;">
        
        <section style="border-right: 1px solid rgba(0, 234, 255, 0.2); padding-right: 20px;">
            <h3 style="color: #00eaff; font-family: 'Orbitron';">Ya soy Tripulante</h3>
            <p>Inicia sesión para usar tus datos guardados.</p>
            <br>
            <a href="login.php" class="btn-neon" style="width: 100%;">Iniciar Sesión</a>
        </section>

        <section>
            <h3 style="color: #fff; font-family: 'Orbitron';">Invitado Civil</h3>
            <p>Continúa sin registrarte en la base de datos.</p>
            <br>
            <a href="datos_envio_invitado.php" class="btn-neon" style="width: 100%; border-color: #fff; color: #fff;">Comprar como Invitado</a>
        </section>

    </div>
</main>

<?php require_once __DIR__ . "/../includes/footer.php"; ?>
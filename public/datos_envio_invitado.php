<?php
require_once __DIR__ . "/../includes/header.php";
require_once __DIR__ . "/../includes/navbar.php";
?>

<main class="capsula-estelar envio-invitado">
    <h2>Datos de Envío</h2>
    <p class="envio-subtitulo">Indica las coordenadas para la entrega de los suministros.</p>

    <form action="procesar_pedido_invitado.php" method="POST" class="form-envio">

        <label>Nombre y Apellidos</label>
        <input type="text" name="nombre" placeholder="Ej: Joseph Cooper" required>

        <label>Email de contacto</label>
        <input type="email" name="email" placeholder="cooper@nasa.gov" required>

        <label>Dirección de entrega</label>
        <input type="text" name="direccion" placeholder="Sector 4, Granja de maíz" required>

        <button type="submit" class="btn-neon btn-full">Confirmar Pedido</button>
    </form>
</main>

<?php require_once __DIR__ . "/../includes/footer.php"; ?>

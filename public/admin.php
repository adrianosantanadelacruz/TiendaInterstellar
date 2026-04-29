<?php
require_once __DIR__ . "/../config/config.php";
require_once __DIR__ . "/../includes/middleware_admin.php"; 
// middleware_admin SIEMPRE antes del header

require_once __DIR__ . "/../includes/header.php";
require_once __DIR__ . "/../includes/navbar.php";
?>

<main class="capsula-estelar admin-box">

    <h2>Panel de administración</h2>
    <p>Aquí gestionaremos productos, clientes y pedidos.</p>

    <section class="admin-grid">

        <article class="admin-card">
            <h3>Productos</h3>
            <p>Listado, alta, baja y modificación de productos.</p>
        </article>

        <article class="admin-card">
            <h3>Clientes</h3>
            <p>Gestión de clientes registrados.</p>
        </article>

        <article class="admin-card">
            <h3>Pedidos</h3>
            <p>Consulta y gestión de pedidos.</p>
        </article>

    </section>

</main>

<?php require_once __DIR__ . "/../includes/footer.php"; ?>

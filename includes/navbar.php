<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$pagina = basename($_SERVER['PHP_SELF']); 

// 1. Calculamos el contador del carrito
$contador = 0;
if (isset($_SESSION["carrito"])) {
    foreach ($_SESSION["carrito"] as $item) {
        $contador += $item["cantidad"];
    }
}

// 2. Si el usuario está logueado, consultamos sus puntos actuales
$puntos_usuario = 0;
if (isset($_SESSION["id_cliente"])) {
    require_once __DIR__ . "/../config/config.php"; // Aseguramos conexión
    $id_c = $_SESSION["id_cliente"];
    $res_puntos = $conn->query("SELECT puntos_acumulados FROM CLIENTE WHERE id_cliente = $id_c");
    if ($row_p = $res_puntos->fetch_assoc()) {
        $puntos_usuario = $row_p['puntos_acumulados'];
    }
}
?>

<header class="header">
    <div class="logo">
        <span class="logo-icon">🚀</span>
        <a href="index.php" class="logo-text">Tienda Interstellar</a>
    </div>

    <nav class="nav">
        <a href="index.php" class="<?= $pagina === 'index.php' ? 'activo' : '' ?>">Inicio</a>
        <a href="productos.php" class="<?= $pagina === 'productos.php' ? 'activo' : '' ?>">Productos</a>

        <a href="carrito.php" class="<?= $pagina === 'carrito.php' ? 'activo' : '' ?>">
            Carrito <span class="badge-neon"><?= $contador ?></span>
        </a>

        <?php if (isset($_SESSION["id_cliente"])): ?>
            <span style="color: #ffcc00; font-weight: bold; margin: 0 10px; display: flex; align-items: center;">
                ⭐ <?= $puntos_usuario ?> Puntos
            </span>

            <?php if (isset($_SESSION["rol"]) && $_SESSION["rol"] == 1): ?>
                <a href="admin.php" class="<?= $pagina === 'admin.php' ? 'activo' : '' ?>">Admin</a>
            <?php endif; ?>

            <a href="logout.php" class="logout-link">Cerrar Sesión</a>
        <?php else: ?>
            <a href="login.php" class="<?= $pagina === 'login.php' ? 'activo' : '' ?>">Login</a>
            <a href="registro.php" class="<?= $pagina === 'registro.php' ? 'activo' : '' ?>">Registro</a>
        <?php endif; ?>

        <a href="sobre.php" class="<?= $pagina === 'sobre.php' ? 'activo' : '' ?>">Sobre nosotros</a>
        <a href="contacto.php" class="<?= $pagina === 'contacto.php' ? 'activo' : '' ?>">Contacto</a>
    </nav>
</header>
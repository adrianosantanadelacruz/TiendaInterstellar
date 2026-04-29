<?php
require_once __DIR__ . "/../config/config.php";
require_once __DIR__ . "/../includes/header.php";
require_once __DIR__ . "/../includes/navbar.php";

// Consulta de productos
$sql = "SELECT id_producto, nombre, descripcion, precio, imagen 
        FROM producto 
        ORDER BY id_producto ASC";
$result = $conn->query($sql);
?>

<div class="main-content">

    <div class="capsula-estelar">
        <h2>Catálogo Estelar</h2>
        <p>Explora nuestra colección de productos tecnológicos y científicos.</p>
    </div>

    <section class="productos-grid">

        <?php if ($result && $result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>

                <article class="producto-card">

                    <div class="producto-img-container">
                        <?php $foto = !empty($row['imagen']) ? $row['imagen'] : 'logo-interstellar.jpg'; ?>
                        <img src="assets/img/<?= $foto ?>" 
                             alt="<?= htmlspecialchars($row['nombre']) ?>" 
                             onerror="this.src='assets/img/logo-interstellar.jpg'">
                    </div>

                    <h3><?= htmlspecialchars($row['nombre']) ?></h3>

                    <p class="descripcion-producto">
                        <?= htmlspecialchars($row['descripcion']) ?>
                    </p>

                    <p class="precio-producto">
                        <?php 
                            $precio_mostrar = ($row['precio'] > 0) ? $row['precio'] : 99.99;
                            echo number_format($precio_mostrar, 2) . " €"; 
                        ?>
                    </p>

                    <form action="agregar_carrito.php" method="POST">
                        <input type="hidden" name="id" value="<?= $row['id_producto'] ?>">
                        <input type="hidden" name="precio" value="<?= $row['precio'] ?>">
                        <button type="submit" class="btn-neon">Añadir al Carrito</button>
                    </form>

                </article>

            <?php endwhile; ?>
        <?php endif; ?>

    </section>
</div>

<?php require_once __DIR__ . "/../includes/footer.php"; ?>

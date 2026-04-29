<?php
require_once __DIR__ . "/../config/config.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . "/../includes/header.php";
require_once __DIR__ . "/../includes/navbar.php";
?>

<main class="capsula-estelar">
    <h2 class="section-title">Tu Carga Estelar</h2>

    <?php if (empty($_SESSION["carrito"])): ?>

        <p class="carrito-vacio">Tu bodega de carga está vacía, astronauta.</p>
        <a href="productos.php" class="btn-neon">Ir al Catálogo</a>

    <?php else: ?>

        <table class="tabla-carrito">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php
                $total_general = 0;

                foreach ($_SESSION["carrito"] as $id => $item):
                    $precio = floatval($item["precio"]);
                    $cantidad = intval($item["cantidad"]);
                    $subtotal = $precio * $cantidad;
                    $total_general += $subtotal;
                ?>
                    <tr>
                        <td><?= htmlspecialchars($item["nombre"]) ?></td>
                        <td><?= number_format($precio, 2) ?> €</td>

                        <td class="cantidad-col">
                            <form action="actualizar_carrito.php" method="POST">
                                <input type="hidden" name="id" value="<?= $id ?>">
                                <input type="hidden" name="accion" value="restar">
                                <button class="btn-cantidad">−</button>
                            </form>

                            <span class="cantidad-num"><?= $cantidad ?></span>

                            <form action="actualizar_carrito.php" method="POST">
                                <input type="hidden" name="id" value="<?= $id ?>">
                                <input type="hidden" name="accion" value="sumar">
                                <button class="btn-cantidad">+</button>
                            </form>
                        </td>

                        <td class="subtotal"><?= number_format($subtotal, 2) ?> €</td>

                        <td>
                            <a href="eliminar_carrito.php?id=<?= $id ?>" class="btn-eliminar">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="total-carrito">
            <h3>Total Carga: <span><?= number_format($total_general, 2) ?> €</span></h3>
            <a href="checkout_opciones.php" class="btn-neon">Finalizar pedido</a>
        </div>

    <?php endif; ?>
</main>

<?php require_once __DIR__ . "/../includes/footer.php"; ?>

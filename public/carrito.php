<?php
require_once __DIR__ . "/../config/config.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// QUITAMOS la comprobación de id_cliente para permitir INVITADOS
// Solo pediremos login cuando pinchen en "Finalizar Pedido"

require_once __DIR__ . "/../includes/header.php";
require_once __DIR__ . "/../includes/navbar.php";
?>

<main class="capsula-estelar">
    <h2 class="section-title">Tu Carga Estelar</h2>

    <?php if (!isset($_SESSION["carrito"]) || empty($_SESSION["carrito"])) : ?>
        <p style="padding: 50px;">Tu bodega de carga está vacía, astronauta.</p>
        <a href="productos.php" class="btn-neon">Ir al Catálogo</a>
    <?php else : ?>

        <table style="width:100%; border-collapse: collapse; color: white;">
            <thead>
                <tr style="border-bottom: 2px solid #00eaff; color: #00eaff;">
                    <th style="padding:15px; text-align: left;">Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total_general = 0;
                foreach ($_SESSION["carrito"] as $id => $item) :
                    // Forzamos que sean números para que la suma no falle
                    $precio = floatval($item["precio"]);
                    $cantidad = intval($item["cantidad"]);
                    $subtotal = $precio * $cantidad;
                    $total_general += $subtotal;
                ?>
                    <tr style="border-bottom: 1px solid rgba(0, 234, 255, 0.2);">
                        <td style="padding:15px; text-align: left;"><?= htmlspecialchars($item["nombre"]) ?></td>
                        <td><?= number_format($precio, 2) ?> €</td>

                        <td style="padding: 10px;">
                            <form action="actualizar_carrito.php" method="POST" style="display:inline;">
                                <input type="hidden" name="id" value="<?= $id ?>">
                                <input type="hidden" name="accion" value="restar">
                                <button style="background:transparent; border:1px solid #00eaff; color:#00eaff; cursor:pointer; width:25px;">-</button>
                            </form>

                            <span style="margin: 0 10px; font-weight: bold;"><?= $cantidad ?></span>

                            <form action="actualizar_carrito.php" method="POST" style="display:inline;">
                                <input type="hidden" name="id" value="<?= $id ?>">
                                <input type="hidden" name="accion" value="sumar">
                                <button style="background:transparent; border:1px solid #00eaff; color:#00eaff; cursor:pointer; width:25px;">+</button>
                            </form>
                        </td>

                        <td style="color: #00eaff; font-weight: bold;"><?= number_format($subtotal, 2) ?> €</td>
                        <td>
                            <a href="eliminar_carrito.php?id=<?= $id ?>" style="color:#ff4d4d; text-decoration: none; font-size: 0.8rem;">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    <div style="margin-top: 40px; text-align: right;">
    <h3 style="font-size: 2rem; margin-bottom: 25px; font-family: 'Orbitron';">
        Total Carga: <span style="color: #00eaff;"><?= number_format($total_general, 2) ?> €</span>
    </h3>
    
    <a href="checkout_opciones.php" class="btn-neon">Finalizar pedido</a>
</div>

    <?php endif; ?>
</main>

<?php require_once __DIR__ . "/../includes/footer.php"; ?>
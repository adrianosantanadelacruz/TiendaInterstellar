<?php
require_once "../config/config.php";
require_once "../includes/middleware_admin.php";

// OBTENER TODOS LOS CLIENTES
$clientes = $conn->query("
    SELECT id_cliente, nombre, apellidos, email, telefono, direccion, puntos_acumulados, id_rol
    FROM CLIENTE
    ORDER BY nombre ASC
");

// SI SE QUIERE VER LOS PEDIDOS DE UN CLIENTE
$pedidos_cliente = null;
if (isset($_GET["ver_pedidos"])) {
    $id_cliente = intval($_GET["ver_pedidos"]);

    $pedidos_cliente = $conn->query("
        SELECT id_pedido, fecha_pedido, total, estado
        FROM PEDIDO
        WHERE id_cliente = $id_cliente
        ORDER BY fecha_pedido DESC
    ");
}
?>

<?php require_once "../includes/header.php"; ?>
<?php require_once "../includes/navbar.php"; ?>

<main class="admin-page">
    <h2>Gestión de Clientes</h2>

    <h3>Listado de clientes</h3>

    <table border="1" cellpadding="10" style="width:100%; border-collapse: collapse;">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Puntos</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>

        <?php while ($c = $clientes->fetch_assoc()) : ?>
            <tr>
                <td><?= $c["id_cliente"] ?></td>
                <td><?= $c["nombre"] . " " . $c["apellidos"] ?></td>
                <td><?= $c["email"] ?></td>
                <td><?= $c["telefono"] ?></td>
                <td><?= $c["puntos_acumulados"] ?></td>
                <td><?= $c["id_rol"] == 1 ? "Administrador" : "Cliente" ?></td>

                <td>
                    <a href="admin_clientes.php?ver_pedidos=<?= $c['id_cliente'] ?>">Ver pedidos</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <?php if ($pedidos_cliente) : ?>
        <hr>
        <h3>Pedidos del cliente</h3>

        <table border="1" cellpadding="10" style="width:100%; border-collapse: collapse;">
            <tr>
                <th>ID Pedido</th>
                <th>Fecha</th>
                <th>Total</th>
                <th>Estado</th>
            </tr>

            <?php while ($p = $pedidos_cliente->fetch_assoc()) : ?>
                <tr>
                    <td><?= $p["id_pedido"] ?></td>
                    <td><?= $p["fecha_pedido"] ?></td>
                    <td><?= number_format($p["total"], 2) ?> €</td>
                    <td>
                        <?php
                        $estados = [
                            0 => "Pendiente",
                            1 => "Pagado",
                            2 => "Enviado",
                            3 => "Entregado"
                        ];
                        echo $estados[$p["estado"]];
                        ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php endif; ?>

</main>

<?php require_once "../includes/footer.php"; ?>

<?php
require_once "../config/config.php";
require_once "../includes/middleware_admin.php";

// CAMBIAR ESTADO DEL PEDIDO
if (isset($_POST["cambiar_estado"])) {
    $id_pedido = intval($_POST["id_pedido"]);
    $nuevo_estado = intval($_POST["estado"]);

    $stmt = $conn->prepare("UPDATE PEDIDO SET estado = ? WHERE id_pedido = ?");
    $stmt->bind_param("ii", $nuevo_estado, $id_pedido);
    $stmt->execute();

    header("Location: admin_pedidos.php");
    exit();
}

// OBTENER TODOS LOS PEDIDOS
$pedidos = $conn->query("
    SELECT p.*, c.nombre AS cliente_nombre, c.apellidos AS cliente_apellidos
    FROM PEDIDO p
    INNER JOIN CLIENTE c ON p.id_cliente = c.id_cliente
    ORDER BY p.fecha_pedido DESC
");
?>

<?php require_once "../includes/header.php"; ?>
<?php require_once "../includes/navbar.php"; ?>

<main class="admin-page">
    <h2>Gestión de Pedidos</h2>

    <table border="1" cellpadding="10" style="width:100%; border-collapse: collapse;">
        <tr>
            <th>ID Pedido</th>
            <th>Cliente</th>
            <th>Fecha</th>
            <th>Total</th>
            <th>Estado</th>
            <th>Productos</th>
            <th>Acciones</th>
        </tr>

        <?php while ($p = $pedidos->fetch_assoc()) : ?>
            <tr>
                <td><?= $p["id_pedido"] ?></td>
                <td><?= $p["cliente_nombre"] . " " . $p["cliente_apellidos"] ?></td>
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

                <td>
                    <?php
                    $id_pedido = $p["id_pedido"];
                    $detalles = $conn->query("
                        SELECT dp.*, pr.nombre 
                        FROM DETALLE_PEDIDO dp
                        INNER JOIN PRODUCTO pr ON dp.id_producto = pr.id_producto
                        WHERE dp.id_pedido = $id_pedido
                    ");

                    while ($d = $detalles->fetch_assoc()) {
                        echo "- " . $d["nombre"] . " (x" . $d["cantidad"] . ")<br>";
                    }
                    ?>
                </td>

                <td>
                    <form method="POST">
                        <input type="hidden" name="id_pedido" value="<?= $p['id_pedido'] ?>">

                        <select name="estado">
                            <option value="0" <?= $p["estado"] == 0 ? "selected" : "" ?>>Pendiente</option>
                            <option value="1" <?= $p["estado"] == 1 ? "selected" : "" ?>>Pagado</option>
                            <option value="2" <?= $p["estado"] == 2 ? "selected" : "" ?>>Enviado</option>
                            <option value="3" <?= $p["estado"] == 3 ? "selected" : "" ?>>Entregado</option>
                        </select>

                        <button type="submit" name="cambiar_estado">Actualizar</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</main>

<?php require_once "../includes/footer.php"; ?>

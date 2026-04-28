<?php
require_once "../config/config.php";
require_once "../includes/middleware_admin.php";

// CREAR PRODUCTO
if (isset($_POST["crear"])) {
    $nombre = trim($_POST["nombre"]);
    $descripcion = trim($_POST["descripcion"]);
    $precio = floatval($_POST["precio"]);
    $stock = intval($_POST["stock"]);
    $categoria = intval($_POST["categoria"]);

    $stmt = $conn->prepare("INSERT INTO PRODUCTO (nombre, descripcion, precio, existencias, id_categoria) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssdii", $nombre, $descripcion, $precio, $stock, $categoria);
    $stmt->execute();
    header("Location: admin_productos.php");
    exit();
}

// ELIMINAR PRODUCTO
if (isset($_GET["eliminar"])) {
    $id = intval($_GET["eliminar"]);
    $stmt = $conn->prepare("DELETE FROM PRODUCTO WHERE id_producto = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: admin_productos.php");
    exit();
}

// EDITAR PRODUCTO
if (isset($_POST["editar"])) {
    $id = intval($_POST["id"]);
    $nombre = trim($_POST["nombre"]);
    $descripcion = trim($_POST["descripcion"]);
    $precio = floatval($_POST["precio"]);
    $stock = intval($_POST["stock"]);
    $categoria = intval($_POST["categoria"]);

    $stmt = $conn->prepare("UPDATE PRODUCTO SET nombre=?, descripcion=?, precio=?, existencias=?, id_categoria=? WHERE id_producto=?");
    $stmt->bind_param("ssdiii", $nombre, $descripcion, $precio, $stock, $categoria, $id);
    $stmt->execute();
    header("Location: admin_productos.php");
    exit();
}

// OBTENER PRODUCTOS
$productos = $conn->query("
    SELECT p.*, c.nombre AS categoria
    FROM PRODUCTO p
    LEFT JOIN CATEGORIA c ON p.id_categoria = c.id_categoria
");

// OBTENER CATEGORÍAS
$categorias = $conn->query("SELECT * FROM CATEGORIA");
?>

<?php require_once "../includes/header.php"; ?>
<?php require_once "../includes/navbar.php"; ?>

<main class="admin-page">
    <h2>Gestión de Productos</h2>

    <h3>Crear nuevo producto</h3>
    <form method="POST">
        <input type="text" name="nombre" placeholder="Nombre" required>
        <textarea name="descripcion" placeholder="Descripción" required></textarea>
        <input type="number" step="0.01" name="precio" placeholder="Precio" required>
        <input type="number" name="stock" placeholder="Stock" required>

        <select name="categoria" required>
            <option value="">Selecciona categoría</option>
            <?php while ($cat = $categorias->fetch_assoc()) : ?>
                <option value="<?= $cat['id_categoria'] ?>"><?= $cat['nombre'] ?></option>
            <?php endwhile; ?>
        </select>

        <button type="submit" name="crear">Crear producto</button>
    </form>

    <hr>

    <h3>Listado de productos</h3>
    <table border="1" cellpadding="10" style="width:100%; border-collapse: collapse;">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Categoría</th>
            <th>Acciones</th>
        </tr>

        <?php while ($p = $productos->fetch_assoc()) : ?>
            <tr>
                <td><?= $p["id_producto"] ?></td>
                <td><?= $p["nombre"] ?></td>
                <td><?= $p["descripcion"] ?></td>
                <td><?= number_format($p["precio"], 2) ?> €</td>
                <td><?= $p["existencias"] ?></td>
                <td><?= $p["categoria"] ?></td>
                <td>
                    <!-- FORMULARIO EDITAR -->
                    <form method="POST" style="display:inline-block;">
                        <input type="hidden" name="id" value="<?= $p['id_producto'] ?>">
                        <input type="text" name="nombre" value="<?= $p['nombre'] ?>" required>
                        <input type="text" name="descripcion" value="<?= $p['descripcion'] ?>" required>
                        <input type="number" step="0.01" name="precio" value="<?= $p['precio'] ?>" required>
                        <input type="number" name="stock" value="<?= $p['existencias'] ?>" required>

                        <select name="categoria" required>
                            <?php
                            $categorias2 = $conn->query("SELECT * FROM CATEGORIA");
                            while ($cat2 = $categorias2->fetch_assoc()) :
                            ?>
                                <option value="<?= $cat2['id_categoria'] ?>" <?= $cat2['id_categoria'] == $p['id_categoria'] ? 'selected' : '' ?>>
                                    <?= $cat2['nombre'] ?>
                                </option>
                            <?php endwhile; ?>
                        </select>

                        <button type="submit" name="editar">Guardar</button>
                    </form>

                    <!-- ELIMINAR -->
                    <a href="admin_productos.php?eliminar=<?= $p['id_producto'] ?>" onclick="return confirm('¿Eliminar producto?')">Eliminar</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</main>

<?php require_once "../includes/footer.php"; ?>

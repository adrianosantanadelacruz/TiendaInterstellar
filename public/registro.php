<?php
require_once __DIR__ . "/../config/config.php";

$error = ""; 

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nombre    = trim($_POST["nombre"] ?? "");
    $apellidos = trim($_POST["apellidos"] ?? "");
    $telefono  = preg_replace('/[^0-9]/', '', $_POST["telefono"] ?? "");
    $email     = filter_var($_POST["email"] ?? "", FILTER_SANITIZE_EMAIL);
    $direccion = trim($_POST["direccion"] ?? "");
    $password  = $_POST["password"] ?? "";

    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $rol_cliente   = 2;

    $stmt = $conn->prepare("
        INSERT INTO cliente (nombre, apellidos, telefono, email, direccion, password_hash, id_rol)
        VALUES (?, ?, ?, ?, ?, ?, ?)
    ");
    $stmt->bind_param("ssssssi", $nombre, $apellidos, $telefono, $email, $direccion, $password_hash, $rol_cliente);

    try {
        if ($stmt->execute()) {
            header("Location: login.php?registro=exito");
            exit();
        }
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() == 1062) {
            $error = "Ese correo ya está registrado en la base de datos de la misión.";
        } else {
            $error = "Error en los motores de registro: " . $e->getMessage();
        }
    }
}

require_once __DIR__ . "/../includes/header.php";
require_once __DIR__ . "/../includes/navbar.php";
?>

<main class="capsula-estelar registro-box">

    <h2>Registro de Tripulante</h2>
    <p>Crea tu perfil para acceder a suministros tecnológicos y científicos.</p>

    <?php if (!empty($error)): ?>
        <div class="registro-error">
            ⚠️ <?= $error ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="" class="registro-form">

        <div class="registro-grid">
            <div>
                <label>Nombre</label>
                <input type="text" name="nombre" placeholder="Cooper" required>
            </div>

            <div>
                <label>Apellidos</label>
                <input type="text" name="apellidos" placeholder="Brand" required>
            </div>
        </div>

        <label>Teléfono de contacto</label>
        <input type="text" name="telefono" placeholder="600000000">

        <label>Email (Identificador)</label>
        <input type="email" name="email" placeholder="tripulante@nasa.gov" required>

        <label>Dirección Terrestre</label>
        <input type="text" name="direccion" placeholder="Sector 4, Granja 12">

        <label>Contraseña de Seguridad</label>
        <input type="password" name="password" placeholder="••••••••" required>

        <button type="submit" class="btn-neon btn-full">Completar Registro</button>
    </form>

    <div class="registro-login">
        <p>¿Ya eres parte de la flota? 
            <a href="login.php" class="link-neon">Inicia sesión aquí</a>
        </p>
    </div>

</main>

<?php require_once __DIR__ . "/../includes/footer.php"; ?>

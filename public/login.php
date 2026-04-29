<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . "/../config/config.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = trim($_POST["email"] ?? "");
    $password = $_POST["password"] ?? "";

    // Consulta segura
    $stmt = $conn->prepare("
        SELECT id_cliente, nombre, password_hash, id_rol 
        FROM cliente 
        WHERE email = ?
    ");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();

        if (password_verify($password, $usuario["password_hash"])) {

            session_regenerate_id(true);

            $_SESSION["id_cliente"] = $usuario["id_cliente"];
            $_SESSION["nombre"]     = $usuario["nombre"];
            $_SESSION["rol"]        = $usuario["id_rol"];

            header("Location: index.php");
            exit();
        }
    }

    $error = "Acceso denegado: Credenciales no válidas.";
}

require_once __DIR__ . "/../includes/header.php";
require_once __DIR__ . "/../includes/navbar.php";
?>

<main class="capsula-estelar login-box">

    <h2>Identificación de Tripulante</h2>
    <p>Ingresa tus credenciales para acceder a la terminal.</p>

    <?php if (!empty($error)): ?>
        <div class="login-error">
            ⚠️ <?= $error ?>
        </div>
    <?php endif; ?>

    <form action="" method="POST" class="login-form">

        <label for="email">Correo Electrónico</label>
        <input type="email" id="email" name="email" placeholder="astronauta@interstellar.com" required>

        <label for="password">Código de Seguridad</label>
        <input type="password" id="password" name="password" placeholder="••••••••" required>

        <button type="submit" class="btn-neon btn-full">Iniciar Sesión</button>
    </form>

    <div class="login-registro">
        <p>¿Aún no tienes cuenta en la base? 
            <a href="registro.php" class="link-neon">Regístrate aquí</a>
        </p>
    </div>

</main>

<?php require_once __DIR__ . "/../includes/footer.php"; ?>

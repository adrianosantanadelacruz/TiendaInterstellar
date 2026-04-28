<?php
// 1. Iniciamos sesión al principio de todo
if (session_status() === PHP_SESSION_NONE) {
    session_start(); 
}

require_once __DIR__ . "/../config/config.php";

$error = ""; 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"] ?? "");
    $password = $_POST["password"] ?? "";

    // 2. Consulta preparada para evitar Inyección SQL
    $stmt = $conn->prepare("SELECT id_cliente, nombre, password_hash, id_rol FROM cliente WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();

        // 3. Verificamos la contraseña con el hash de la BD
        if (password_verify($password, $usuario["password_hash"])) {
            
            session_regenerate_id(true);

            $_SESSION["id_cliente"] = $usuario["id_cliente"];
            $_SESSION["nombre"]     = $usuario["nombre"];
            $_SESSION["rol"]        = $usuario["id_rol"];

            header("Location: index.php");
            exit();
        } else {
            $error = "Acceso denegado: Credenciales no válidas.";
        }
    } else {
        $error = "Acceso denegado: Credenciales no válidas.";
    }
}

// Carga de cabeceras después de la lógica de redirección
require_once __DIR__ . "/../includes/header.php";
require_once __DIR__ . "/../includes/navbar.php";
?>

<main class="capsula-estelar">
    <h2>Identificación de Tripulante</h2>
    <p>Ingresa tus credenciales para acceder a la terminal.</p>

    <?php if (!empty($error)): ?>
        <div style="background: rgba(255, 77, 77, 0.2); border: 1px solid #ff4d4d; color: #ff4d4d; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
            ⚠️ <?= $error ?>
        </div>
    <?php endif; ?>

    <form action="" method="POST" style="max-width: 400px; margin: 0 auto;">
        <label for="email">Correo Electrónico</label>
        <input type="email" id="email" name="email" placeholder="astronauta@interstellar.com" required>

        <label for="password">Código de Seguridad</label>
        <input type="password" id="password" name="password" placeholder="••••••••" required>

        <button type="submit" class="btn-neon">Iniciar Sesión</button>
    </form>

    <div style="margin-top: 30px; border-top: 1px solid rgba(0, 234, 255, 0.3); padding-top: 20px;">
        <p>¿Aún no tienes cuenta en la base? <a href="registro.php" style="color: #00eaff; text-decoration: none; font-weight: bold;">Regístrate aquí</a></p>
    </div>
</main>

<?php require_once __DIR__ . "/../includes/footer.php"; ?>
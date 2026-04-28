<?php
// No hace falta session_start si ya está en config.php, 
// pero poner esto no hace daño y asegura que la sesión exista.
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Comprobamos: ¿No existe el rol? O ¿El rol no es 1 (Admin)?
if (!isset($_SESSION["rol"]) || $_SESSION["rol"] != 1) {
    // Si estás en la carpeta /public, solo pon "login.php"
    header("Location: login.php");
    exit();
}
?>
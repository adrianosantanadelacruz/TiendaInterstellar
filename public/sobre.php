<?php
require_once __DIR__ . "/../config/config.php";
require_once __DIR__ . "/../includes/header.php";
require_once __DIR__ . "/../includes/navbar.php";
?>

<main class="capsula-estelar" style="text-align: left; max-width: 900px;">
    <h2>Sobre la Misión Interstellar</h2>
    <p style="font-size: 1.1rem; line-height: 1.6; margin-bottom: 25px;">
        Tienda Interstellar nace como un proyecto inspirado en la fascinación por la ciencia, la tecnología y la exploración espacial. Nuestro objetivo es acercar al público productos tecnológicos, científicos y astronómicos que despierten la curiosidad y el aprendizaje.
    </p>

    <hr style="border: 0; border-top: 1px solid rgba(0, 234, 255, 0.3); margin: 30px 0;">

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px;">
        <section>
            <h3 style="color: #00eaff; margin-bottom: 15px; font-family: 'Orbitron'; font-size: 1.1rem;">Nuestra Filosofía</h3>
            <p style="font-size: 0.9rem;">Creemos en un futuro donde la humanidad sigue mirando hacia las estrellas. Por eso ofrecemos productos que fomentan el conocimiento, la experimentación y el espíritu explorador.</p>
        </section>

        <section>
            <h3 style="color: #00eaff; margin-bottom: 15px; font-family: 'Orbitron'; font-size: 1.1rem;">La Misión</h3>
            <p style="font-size: 0.9rem;">Proveer material tecnológico y científico accesible, de calidad y con un enfoque educativo para las nuevas generaciones de exploradores.</p>
        </section>
    </div>

    <section style="margin-top: 40px; background: rgba(0, 234, 255, 0.05); padding: 25px; border-radius: 10px; border-left: 4px solid #00eaff;">
        <h3 style="color: #00eaff; margin-bottom: 10px; font-family: 'Orbitron'; font-size: 1.1rem;">Nuestra Visión</h3>
        <p style="font-size: 0.9rem;">Convertirnos en una tienda de referencia para estudiantes, aficionados y profesionales del ámbito científico y espacial, creando una comunidad que no tema cruzar el horizonte de sucesos.</p>
    </section>

    <div style="text-align: center; margin-top: 40px;">
        <a href="productos.php" class="btn-neon">Ver Equipamiento</a>
    </div>
</main>

<?php require_once __DIR__ . "/../includes/footer.php"; ?>
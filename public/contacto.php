<?php
require_once __DIR__ . "/../includes/header.php";
require_once __DIR__ . "/../includes/navbar.php";
?>

<main class="capsula-estelar contacto-box">

    <h2>Centro de Comunicaciones</h2>
    <p class="contacto-subtitulo">
        Si tienes dudas o necesitas asistencia técnica para tu misión, envíanos una señal.
    </p>

    <div class="contacto-grid">
        
        <section class="contacto-info">
            <h3 class="contacto-titulo">Información de la Base</h3>
            
            <div class="contacto-item">
                <strong>Email:</strong><br>
                <span>soporte@tiendainterstellar.com</span>
            </div>

            <div class="contacto-item">
                <strong>Frecuencia (Tel):</strong><br>
                <span>+34 600 000 000</span>
            </div>

            <div class="contacto-item">
                <strong>Coordenadas:</strong><br>
                <span>Base NASA, Sector 1G, Madrid.</span>
            </div>

            <div class="contacto-cita">
                <p>"No te vayas dócilmente en esa buena noche.  
                Rabia, rabia contra la muerte de la luz."</p>
            </div>
        </section>

        <section>
            <form action="procesar_contacto.php" method="POST" class="contacto-form">

                <label>Nombre del Tripulante</label>
                <input type="text" name="nombre" placeholder="Cooper" required>

                <label>Canal de Email</label>
                <input type="email" name="email" placeholder="tripulante@nasa.gov" required>

                <label>Mensaje / Reporte</label>
                <textarea name="mensaje" placeholder="Escribe tu mensaje aquí..." required></textarea>

                <button type="submit" class="btn-neon btn-full">Enviar Señal</button>
            </form>
        </section>

    </div>
</main>

<?php require_once __DIR__ . "/../includes/footer.php"; ?>

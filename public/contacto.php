<?php
require_once __DIR__ . "/../includes/header.php";
require_once __DIR__ . "/../includes/navbar.php";
?>

<main class="capsula-estelar" style="max-width: 1000px;">
    <h2>Centro de Comunicaciones</h2>
    <p style="margin-bottom: 30px;">Si tienes dudas o necesitas asistencia técnica para tu misión, envíanos una señal.</p>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px; text-align: left;">
        
        <section style="border-right: 1px solid rgba(0, 234, 255, 0.2); padding-right: 20px;">
            <h3 style="color: #00eaff; font-family: 'Orbitron'; margin-bottom: 20px;">Información de la Base</h3>
            
            <div style="margin-bottom: 20px;">
                <strong style="color: #00eaff;">Email:</strong><br>
                <span>soporte@tiendainterstellar.com</span>
            </div>

            <div style="margin-bottom: 20px;">
                <strong style="color: #00eaff;">Frecuencia (Tel):</strong><br>
                <span>+34 600 000 000</span>
            </div>

            <div style="margin-bottom: 20px;">
                <strong style="color: #00eaff;">Coordenadas:</strong><br>
                <span>Base NASA, Sector 1G, Madrid.</span>
            </div>

            <div style="margin-top: 30px; background: rgba(0, 234, 255, 0.1); padding: 15px; border-radius: 8px;">
                <p style="font-size: 0.85rem; font-style: italic;">"No te vayas dócilmente en esa buena noche. Rabia, rabia contra la muerte de la luz."</p>
            </div>
        </section>

        <section>
            <form action="procesar_contacto.php" method="POST" style="align-items: flex-start;">
                <label>Nombre del Tripulante</label>
                <input type="text" name="nombre" placeholder="Cooper" required style="max-width: 100%;">

                <label>Canal de Email</label>
                <input type="email" name="email" placeholder="tripulante@nasa.gov" required style="max-width: 100%;">

                <label>Mensaje / Reporte</label>
                <textarea name="mensaje" placeholder="Escribe tu mensaje aquí..." required 
                    style="width: 100%; height: 120px; background: rgba(0,0,0,0.5); border: 1px solid #00eaff; color: white; padding: 10px; border-radius: 5px; font-family: sans-serif;"></textarea>

                <button type="submit" class="btn-neon" style="width: 100%; margin-top: 20px;">Enviar Señal</button>
            </form>
        </section>
    </div>
</main>

<?php require_once __DIR__ . "/../includes/footer.php"; ?>
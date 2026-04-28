<?php
require_once __DIR__ . "/../includes/header.php";
require_once __DIR__ . "/../includes/navbar.php";
require_once __DIR__ . "/../config/config.php";

$id_cliente = $_SESSION["id_cliente"];

// 1. Obtener puntos totales
$res = $conn->query("SELECT puntos_acumulados FROM CLIENTE WHERE id_cliente = $id_cliente");
$cliente = $res->fetch_assoc();

// 2. Obtener historial de puntos (uniendo con la tabla PEDIDO según tu diagrama)
$sql_historial = "SELECT h.fecha, h.tipo, p.total 
                  FROM HISTORIAL_PUNTOS h
                  JOIN PEDIDO p ON h.id_pedido = p.id_pedido
                  WHERE p.id_cliente = $id_cliente
                  ORDER BY h.fecha DESC";
$historial = $conn->query($sql_historial);
?>

<main class="capsula-estelar" style="max-width: 800px;">
    <h2 class="section-title">Expediente de Tripulante</h2>

    <div style="background: linear-gradient(45deg, rgba(255,204,0,0.1), rgba(0,234,255,0.1)); border: 1px solid #ffcc00; padding: 30px; border-radius: 15px; margin-bottom: 40px;">
        <p style="text-transform: uppercase; letter-spacing: 2px; font-size: 0.8rem; color: #ffcc00;">Puntos de Reputación Estelar</p>
        <h3 style="font-size: 3rem; font-family: 'Orbitron'; margin: 10px 0;"><?= $cliente['puntos_acumulados'] ?> ⭐</h3>
    </div>

    <h3>Historial de Misiones</h3>
    <table style="width:100%; border-collapse: collapse; margin-top: 20px; color: white;">
        <thead>
            <tr style="border-bottom: 2px solid #00eaff; color: #00eaff;">
                <th style="padding: 10px; text-align: left;">Fecha</th>
                <th style="padding: 10px; text-align: left;">Concepto</th>
                <th style="padding: 10px; text-align: right;">Créditos Gastados</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $historial->fetch_assoc()): ?>
                <tr style="border-bottom: 1px solid rgba(255,255,255,0.1);">
                    <td style="padding: 15px;"><?= date("d/m/Y", strtotime($row['fecha'])) ?></td>
                    <td><?= htmlspecialchars($row['tipo']) ?></td>
                    <td style="text-align: right;"><?= number_format($row['total'], 2) ?> €</td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</main>

<?php require_once __DIR__ . "/../includes/footer.php"; ?>
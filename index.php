<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Rutas
$wifi_file = "/var/www/html/scan/wifi_data.json";
$ble_file  = "/var/www/html/scan/ble_data.json";

/**
 * Lee JSON estándar o JSON por líneas
 */
function readJsonFlexible($file) {
    if (!file_exists($file)) return [];

    $raw = trim(file_get_contents($file));
    if ($raw === "") return [];

    // Intentar JSON directo
    $data = json_decode($raw, true);
    if (json_last_error() === JSON_ERROR_NONE) {
        return is_array($data) ? $data : [$data];
    }

    // Leer por líneas (NDJSON)
    $lines = explode("\n", $raw);
    $result = [];

    foreach ($lines as $line) {
        $line = trim($line);
        if ($line === "") continue;

        $obj = json_decode($line, true);
        if (json_last_error() === JSON_ERROR_NONE) {
            $result[] = $obj;
        }
    }

    return $result;
}

$wifi_data = readJsonFlexible($wifi_file);
$ble_data  = readJsonFlexible($ble_file);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Datos del escaneo</title>

    <!-- AUTO-REFRESH CADA 5 SEGUNDOS -->
    <meta http-equiv="refresh" content="5">

    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 30px; background: #f9f9f9; }
        th, td { padding: 10px; border: 1px solid #ccc; }
        th { background: #333; color: white; }
        tr:nth-child(even) { background: #e6e6e6; }
        .empty { color: red; font-style: italic; }
    </style>
</head>
<body>

<h1>Datos del escaneo</h1>

<!-- ============================
          TABLA WIFI
     ============================ -->
<h2>Redes WiFi detectadas</h2>

<?php if (empty($wifi_data)): ?>
    <p class="empty">No hay datos WiFi todavía.</p>
<?php else: ?>
<table>
    <tr>
        <th>SSID</th>
        <th>BSSID</th>
        <th>Canal</th>
        <th>RSSI</th>
        <th>Distancia (m)</th>
        <th>Timestamp</th>
    </tr>
    <?php foreach ($wifi_data as $w): ?>
    <tr>
        <td><?= htmlspecialchars($w["ssid"] ?? "—") ?></td>
        <td><?= htmlspecialchars($w["bssid"] ?? "—") ?></td>
        <td><?= htmlspecialchars($w["channel"] ?? "—") ?></td>
        <td><?= htmlspecialchars($w["rssi"] ?? "—") ?></td>
        <td><?= htmlspecialchars($w["distance"] ?? "—") ?></td>
        <td><?= htmlspecialchars($w["timestamp"] ?? "—") ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<?php endif; ?>


<!-- ============================
           TABLA BLE
     ============================ -->
<h2>Dispositivos BLE detectados</h2>

<?php if (empty($ble_data)): ?>
    <p class="empty">No hay datos BLE todavía.</p>
<?php else: ?>
<table>
    <tr>
        <th>Nombre</th>
        <th>MAC</th>
        <th>Vendor</th>
        <th>RSSI</th>
        <th>Distancia (m)</th>
        <th>Timestamp</th>
    </tr>
    <?php foreach ($ble_data as $b): ?>
    <tr>
        <td><?= htmlspecialchars($b["name"] ?? "—") ?></td>
        <td><?= htmlspecialchars($b["address"] ?? $b["mac"] ?? "—") ?></td>
        <td><?= htmlspecialchars($b["vendor"] ?? "—") ?></td>
        <td><?= htmlspecialchars($b["rssi"] ?? "—") ?></td>
        <td><?= htmlspecialchars($b["distance"] ?? "—") ?></td>
        <td><?= htmlspecialchars($b["timestamp"] ?? "—") ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<?php endif; ?>

</body>
</html>

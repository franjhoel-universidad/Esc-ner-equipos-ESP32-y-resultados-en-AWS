<?php
header("Content-Type: application/json");

// Archivo donde se guardan los datos:
$file = "wifi_data.json";

// Recibir datos enviados por ESP32
$raw = file_get_contents("php://input");
$data = json_decode($raw, true);

if (!$data) {
    echo json_encode(["status" => "error", "msg" => "JSON inválido"]);
    exit;
}

// Guardar en archivo
file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));

echo json_encode(["status" => "ok", "msg" => "WiFi data saved"]);

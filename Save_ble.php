<?php
header("Content-Type: application/json");

$file = "ble_data.json";

$raw = file_get_contents("php://input");
$data = json_decode($raw, true);

if (!$data) {
    echo json_encode(["status" => "error", "msg" => "JSON inválido"]);
    exit;
}

file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));

echo json_encode(["status" => "ok", "msg" => "BLE data saved"]);

<?php
// ✅ Allow frontend from Render
header("Access-Control-Allow-Origin: *");

$host = "sql312.infinityfree.com";
$dbname = "if0_39380593_guvi";
$username = "if0_39380593";
$password = "04BAAPxnPu";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    header('Content-Type: application/json');
    echo json_encode([
        "success" => false,
        "message" => "DB connection failed"
    ]);
    exit;
}
?>

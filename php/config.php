<?php
$host = "sql311.infinityfree.com";          // ✅ MySQL Hostname
$dbname = "if0_39380593_guvi";              // ✅ Exact DB name
$username = "if0_39380593";                 // ✅ MySQL Username
$password = "04BAAPxnPu";                   // ✅ MySQL Password

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

<?php
$host = "sql12.freesqldatabase.com";      // ✅ Host
$dbname = "sql12788193";                  // ✅ Database name
$username = "sql12788193";                // ✅ Username
$password = "VakMUL3T1P";                 // ✅ Password from email

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    header('Content-Type: application/json');
    echo json_encode([
        "success" => false,
        "message" => "DB connection failed",
        "error" => $e->getMessage() // you can remove this later
    ]);
    exit;
}
?>
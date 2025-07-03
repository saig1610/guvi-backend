<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

require 'config.php';

$email = $_POST['email'] ?? '';

if (!$email) {
    echo json_encode(["success" => false, "message" => "Email is required."]);
    exit;
}

try {
    $stmt = $pdo->prepare("SELECT name, email, age, dob, contact FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($data) {
        echo json_encode(["success" => true, "data" => $data]);
    } else {
        echo json_encode(["success" => false, "message" => "User not found."]);
    }
} catch (PDOException $e) {
    echo json_encode(["success" => false, "message" => "Server error."]);
}
?>

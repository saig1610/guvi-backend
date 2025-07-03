<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

require 'config.php';

// Collect data
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$pass = $_POST['password'] ?? '';
$age = trim($_POST['age'] ?? '');
$dob = trim($_POST['dob'] ?? '');
$contact = trim($_POST['contact'] ?? '');

// Validation
if (!$name || !$email || !$pass || !$age || !$dob || !$contact) {
    echo json_encode(["status" => "error", "message" => "All fields are required."]);
    exit();
}

// Password Hashing
$hashedPassword = password_hash($pass, PASSWORD_DEFAULT);

try {
    // Check if email exists
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
    $stmt->execute([$email]);

    if ($stmt->fetchColumn() > 0) {
        echo json_encode(["status" => "error", "message" => "Email already exists."]);
        exit();
    }

    // Insert
    $insert = $pdo->prepare("INSERT INTO users (name, email, password, age, dob, contact) VALUES (?, ?, ?, ?, ?, ?)");
    $insert->execute([$name, $email, $hashedPassword, $age, $dob, $contact]);

    echo json_encode(["status" => "success", "message" => "Signup successful!"]);
} catch (PDOException $e) {
    echo json_encode(["status" => "error", "message" => "Signup failed."]);
}
?>

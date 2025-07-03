<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

require 'config.php';

// Get fields
$email = $_POST['email'] ?? '';
$age = $_POST['age'] ?? '';
$dob = $_POST['dob'] ?? '';
$contact = $_POST['contact'] ?? '';

// Only check editable fields
if (!$age || !$dob || !$contact) {
    echo json_encode(["success" => false, "message" => "All fields are required."]);
    exit;
}

try {
    $stmt = $pdo->prepare("UPDATE users SET age = ?, dob = ?, contact = ? WHERE email = ?");
    $stmt->execute([$age, $dob, $contact, $email]);

    echo json_encode(["success" => true, "message" => "Profile updated successfully!"]);
} catch (PDOException $e) {
    echo json_encode(["success" => false, "message" => "Update failed."]);
}
?>

<?php
require 'config.php';

if (!isLoggedIn()) {
    echo json_encode(['success' => false, 'message' => 'Not logged in']);
    exit;
}

$data = json_decode(file_get_contents('php://input'), true);

$stmt = $conn->prepare("INSERT INTO cart (user_id, product_id, product_title, product_price, product_image) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("iisds", $_SESSION['user_id'], $data['id'], $data['title'], $data['price'], $data['image']);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false]);
}
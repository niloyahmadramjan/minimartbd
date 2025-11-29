<?php
session_start();
$conn = new mysqli("localhost", "minimardbd_db", "GRbWjrYrb9mRSxM", "minimardbd_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}
?>
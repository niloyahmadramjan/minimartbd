<?php
$servername = "localhost";
$username = "minimardbd_db";
$password = "GRbWjrYrb9mRSxM";
$dbname = "minimardbd_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

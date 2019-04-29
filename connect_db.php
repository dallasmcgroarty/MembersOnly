<?php
//connect to food database
$servername = "localhost";
$username = "foodUser";
$password = "food123";
$db = "Food";

$conn = new mysqli($servername, $username, $password, $db);

if($conn->connect_error) {
    die("connection failed: " . $conn->connect_error);
}

echo "\r\n<br />" . "Connected successfully" . "\r\n<br />";
?>
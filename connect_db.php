<?php
//connect to food database

function connect_db() {
 
    $conn = new mysqli("localhost", "foodUser" , "food123", "Food");

    if($conn->connect_error) {
        die("connection failed: " . $conn->connect_error);
    }   
    else {
        return $conn;
    }
}
?>
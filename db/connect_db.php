<?php
//connect to food database

function connect_db() {
 
    $conn = new mysqli("host", "user" , "password", "db");

    if($conn->connect_error) {
        die("connection failed: " . $conn->connect_error);
    }   
    else {
        return $conn;
    }
}
?>

<?php
    require('user_auth.php');

    $first = $_POST['firstName'];
    $last = $_POST['lastName'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

    if(!form_filled($_POST))
    {
        echo "<p class='text-center' style='color: red; font-weight: bold'>Please fill in all fields to register</p>";
    }
    elseif(!validate_email($email))
    {
        echo "<p class='text-center' style='color: red; font-weight: bold'>Please enter a valid email address</p>";
    }
    else {
        $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);
        register($first, $last, $email, $hashed_pass);
    }

?>
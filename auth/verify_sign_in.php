<?php
//file to verify user sign in
    require('user_auth.php');

    session_start();
    
    $email = trim($_POST['email']);
    $pass = trim($_POST['password']);

    if(!form_filled($_POST))
    {
        echo "<p class='text-center' style='color: red; font-weight: bold'>Please fill in all fields to register</p>";
    }
    elseif(!validate_email($email))
    {
        echo "<p class='text-center' style='color: red; font-weight: bold'>Please enter a valid email address</p>";
    }
    else{
        if(sign_in($email, $pass))
        {
            $_SESSION['user'] = $email;
            header('Location: members_home.php');
        }
        else{
            echo "<p class='text-center' style='color: red; font-weight: bold'>Incorrect password!</p>";
        }
    }
?>
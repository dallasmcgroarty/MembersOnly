<?php
//file for all user authentication functions

    //check user filled form
    function form_filled($form)
    {
        foreach ($form as $key => $value)
        {
            if((!isset($key)) || ($value == ''))
            {
                return false;
            }
        }
        return true;
    }

    //validate email address
    function validate_email ($email)
    {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            return false;
        }
        return true;
    }

    //register user in database
    function register($first, $last, $email, $pass)
    {
        require('connect_db.php');

        $conn = connect_db();
        
        $stmt = $conn->prepare('SELECT * FROM Users WHERE Email = ?');
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if(!$result)
        {
            echo "<p class='text-center' style='color: red; font-weight: bold'>Could not execute query</p>";
        }
        elseif($result->num_rows > 0)
        {
            echo "<p class='text-center' style='color: red; font-weight: bold'>That email address is already in use!</p>";
        }
        else {
            $stmt = $conn->prepare('INSERT INTO Users (FirstName, LastName, Email, PasswordHash) VALUES (?, ?, ?, ?)');
            $stmt->bind_param('ssss', $first, $last, $email, $pass);
            $stmt->execute();
            if(!$stmt)
            {
                echo "<p class='text-center' style='color: red; font-weight: bold'>Error registering! Please try again</p>";
            }
            else
            {
                echo "<p class='text-center' style='color: LawnGreen; font-weight: bold'>Registration Successful!</p>";
            }
        }
    }
?>
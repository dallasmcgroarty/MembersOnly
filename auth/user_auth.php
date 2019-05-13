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

    //register user in database as long as all fields are valid
    function register($first, $last, $email, $pass)
    {
        require('db/connect_db.php');

        $conn = connect_db();

        $pass = mysqli_real_escape_string($conn, $pass);
        //hash password now after escaping string
        $pass = password_hash($pass, PASSWORD_DEFAULT);

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
                echo "<p class='text-center' style='color: LawnGreen; font-weight: bold'>Registration Successful!<br/>
                You can now sign in!</p>";
            }
            $stmt->close();
        }
        $conn->close();
    }

    //sign in user check database and create a session user
    function sign_in($email, $pass)
    {
        //session_start();

        require('db/connect_db.php');

        $conn = connect_db();

        $stmt = $conn->prepare('SELECT * FROM Users WHERE Email = ?');
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if(!$result)
        {
            echo "<p class='text-center' style='color: red; font-weight: bold'>Invalid email!</p>";
        }
        while($row = $result->fetch_assoc())
        {
            $realpass = $row['PasswordHash'];

            if(password_verify($pass, $realpass))
            {
                $_SESSION['user'] = $email;
                return true;
            }
            else {
                return false;
            }
        }
        $stmt->close();
        $conn->close();
    }

    //check if user has signed in already
    function check_user()
    {
        session_start();
        
        if(!empty($_SESSION['user']))
        {
            return true;
        }
        else {
            return false;
        }
    }
?>
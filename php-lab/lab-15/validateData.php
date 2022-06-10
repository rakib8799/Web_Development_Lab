<?php
function validateData($conn)
{
    require_once './config/db.php';

    $nameErr = $usernameErr = $emailErr = $passwordErr = $confirm_passwordErr = $contactErr = "";
    $name = $username = $email = $password = $confirm_password = $contact = "";
    extract($_POST);

    if (empty($name)) {
        $nameErr = "Name must be provided";
    } else {
        $name = test_input($name);

        if (!preg_match("/^[a-zA-Z\s]{3,25}$/", $name)) {
            $nameErr = "Invalid name";
        }
    }
    if (empty($username)) {
        $usernameErr = "Username must be provided";
    } else {
        $username = test_input($username);
        if (!preg_match("/^[\w]{5,15}$/", $username)) {
            $usernameErr = "Invalid username";
        }
    }
    if (empty($email)) {
        $emailErr = "Email must be provided";
    } else {
        $email = test_input($email);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email";
        }
    }
    if (empty($password)) {
        $passwordErr = "Password must be provided";
    } else {
        $password = test_input($password);
        if (!preg_match("/^.{8,20}\S$/", $password)) {
            $passwordErr = "Invalid password";
        }
    }
    if (empty($confirm_password)) {
        $confirm_passwordErr = "Password must be provided";
    } else {
        $confirm_password = test_input($confirm_password);
        if (!preg_match("/^.{8,20}\S$/", $confirm_password)) {
            $confirm_passwordErr = "Invalid password";
        }
    }
    if (empty($contact)) {
        $contactErr = "Contact must be provided";
    } else {
        $contact = test_input($contact);
        if (!preg_match("/^01[3-9]{1}[0-9]{8}$/", $contact)) {
            $contactErr = "Invalid contact";
        }
    }

    function escapeString($conn, $str)
    {
        return mysqli_real_escape_string($conn, $str);
    }
    $name = $nameErr ? escapeString($conn, $nameErr) : escapeString($conn, $name);
    $username = $usernameErr ? escapeString($conn, $usernameErr) : escapeString($conn, $username);
    $email = $emailErr ? escapeString($conn, $emailErr) : escapeString($conn, $email);
    $password = $passwordErr ? escapeString($conn, $passwordErr) : escapeString($conn, $password);
    $confirm_password = $confirm_passwordErr ? escapeString($conn, $confirm_passwordErr) : escapeString($conn, $confirm_password);
    $contact = $contactErr ? escapeString($conn, $contactErr) : escapeString($conn, $contact);

    $arr = ["name" => $name, "username" => $username, "email" => $email, "password" => $password, "confirm_password" => $confirm_password, "contact" => $contact];
    return $arr;
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = strip_tags($data);
    $data = htmlspecialchars($data);
    return $data;
}

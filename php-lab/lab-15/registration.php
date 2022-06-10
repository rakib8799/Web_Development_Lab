<?php
session_start();
require_once './config/db.php';
include_once './validateData.php';
if (isset($_POST['register'])) {
    $arr = validateData($conn);
    extract($arr);
    if ($password === $confirm_password) {
        $checkEmail = "SELECT email FROM users WHERE email = '$email'";
        $checkEmail_run = mysqli_query($conn, $checkEmail);
        if (mysqli_num_rows($checkEmail_run) > 0) {
            $_SESSION['message'] = "Already Email Exists";
            header('location:index.php');
            exit(0);
        } else {
            $user_query = "INSERT INTO users(name,username,email,password,contact) VALUES('$name','$username','$email',md5('$password'),'$contact')";
            $user_query_run = mysqli_query($conn, $user_query);
            if ($user_query_run) {
                $_SESSION['message'] = "Registered Successfully";
                header('location:loginForm.php');
                exit(0);
            } else {
                $_SESSION['message'] = "Something went wrong!";
                header('location:index.php');
                exit(0);
            }
        }
    } else {
        $_SESSION['message'] = "Password and Confirm Password doesn't match";
        header('location:index.php');
        exit(0);
    }
}

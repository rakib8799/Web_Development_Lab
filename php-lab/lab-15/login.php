<?php
session_start();
require_once './config/db.php';
if (isset($_POST['login'])) {
    extract($_POST);
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);
    $login_query = "SELECT * FROM users WHERE email='$email' && password=md5('$password')";
    $login_query_run = mysqli_query($conn, $login_query);
    $count = mysqli_num_rows($login_query_run);
    if ($count > 0) {
        foreach ($login_query_run as $data) {
            extract($data);
        }
        // $row = mysqli_fetch_assoc($result);
        $_SESSION['auth'] = true;
        $_SESSION['auth_role'] = "$role_as";
        $_SESSION['auth_user'] = [
            "id" => $id,
            "name" => $name,
            "username" => $username,
            "email" => $email,
            "contact" => $contact
        ];
        if ($_SESSION['auth_role'] === "1") {
            $_SESSION['message'] = "Welcome to admin dashboard";
            header('Location:admin/index.php');
            exit(0);
        } else {
            $_SESSION['message'] = "You are logged in";
            header('Location:user.php');
            exit(0);
        }
        // header('Location:get.php');
    } else {
        $_SESSION['message'] = "Invalid email or password";
        header('Location:loginForm.php');
        exit(0);
    }
} else {
    $_SESSION['message'] = "You are not allowed to access this file";
    header('Location:loginForm.php');
    exit(0);
}

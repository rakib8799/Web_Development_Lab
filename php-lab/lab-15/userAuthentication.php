<?php
session_start();
require_once './config/db.php';
if (!isset($_SESSION['auth'])) {
    $_SESSION['message'] = "Login to access User dashboard";
    header("Location:loginForm.php");
    exit(0);
} else {
    if ($_SESSION['auth_role'] !== "0") {
        $_SESSION['message'] = "USER is not found";
        header("Location:loginForm.php");
        exit(0);
    }
}

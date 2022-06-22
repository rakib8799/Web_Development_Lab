<?php
session_start();
require_once '../config/db.php';
if (!isset($_SESSION['auth'])) {
    $_SESSION['message'] = "Login to access Admin dashboard";
    header("Location: ../loginForm.php");
    exit(0);
} else {
    if ($_SESSION['auth_role'] !== "1") {
        $_SESSION['message'] = "You are not authorized as ADMIN";
        header("Location: ../loginForm.php");
        exit(0);
    }
}

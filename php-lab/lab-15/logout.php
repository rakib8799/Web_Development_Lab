<?php
session_start();
// session_unset();
unset($_SESSION['auth']);
unset($_SESSION['auth_role']);
unset($_SESSION['auth_user']);
$_SESSION['message'] = "Logout successfully";
header('location:loginForm.php');
exit(0);

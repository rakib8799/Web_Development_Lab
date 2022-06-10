<?php
include_once './authentication.php';
$id = $_GET['id'];
$sql = "DELETE FROM users WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
if ($result) {
    $_SESSION['message'] = "User deleted successfully";
    header("Location:view_register.php");
    exit(0);
} else {
    $_SESSION['message'] = "User is not deleted yet!";
    header("Location:view_register.php");
    exit(0);
}

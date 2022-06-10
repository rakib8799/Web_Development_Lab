<?php
include_once './authentication.php';
if (isset($_POST['add_user'])) {
    extract($_POST);
    $status = ($status == true) ? '1' : '0';
    $user_query = "INSERT INTO users(name,username,email,password,contact,role_as,status) VALUES('$name','$username','$email','$password','$contact','$role_as','$status')";
    $user_query_run = mysqli_query($conn, $user_query);
    if ($user_query_run) {
        $_SESSION['message'] = "Admin/User is added successfully";
        header('location:view_register.php');
        exit(0);
    } else {
        $_SESSION['message'] = "Something went wrong!";
        header('location:view_register.php');
        exit(0);
    }
}
if (isset($_POST['update_users'])) {
    extract($_POST);
    $status = ($status == true) ? '1' : '0';
    $sql = "UPDATE users SET name='$name',username='$username',email='$email',password='$password',contact='$contact',role_as='$role_as',status='$status' WHERE id='$user_id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $_SESSION['message'] = "User updated successfully";
        header("Location:view_register.php");
        exit(0);
    } else {
        $_SESSION['message'] = "User is updated yet!";
        header("Location:view_register.php");
        exit(0);
    }
}

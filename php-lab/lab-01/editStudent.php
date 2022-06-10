<?php
require_once '../config/db.php';
require_once 'validateData.php';
include_once './getImage.php';

$id = $_POST['id'];

if (isset($_POST['update'])) {
    $arr = validateData($conn);
    extract($arr);
    // if (isset($image)) {
    //     // $image = getImage();
    //     $image = $_FILES["image"];
    //     // $src = ;
    //     // $destination = ;
    // }
    // else {
    //     $image = $_FILES['image']['name'];
    // }
    $updateData = "UPDATE student SET name='$name',email='$email',gender='$gender',course='$course',batch='$batch',image='$image' WHERE id=$id";
    $result = mysqli_query($conn, $updateData);
    if ($result) {
        echo 'Data updated successfully';
        header('location: ' . SITE_URL . 'getStudents.php');
    } else {
        echo 'Data is not updated';
    }
}

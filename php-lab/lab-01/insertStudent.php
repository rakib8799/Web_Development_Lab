<?php
require_once '../config/db.php';
require_once 'validateData.php';

if (isset($_POST['submit'])) {
    $arr = validateData($conn);
    extract($arr);
    $insertData = "INSERT INTO student(name,email,gender,course,batch,image) VALUES( '$name', '$email', '$gender', '$course', '$batch','$image')";
    $result = mysqli_query($conn, $insertData);
    if ($result) {
        echo 'Data inserted successfully';
        header('location: ' . SITE_URL . 'getStudents.php');
    } else {
        echo 'Data is not inserted';
    }
}

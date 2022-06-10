<?php
require_once '../config/db.php';
if (isset($_GET['id'], $_GET['image'])) {
    $id = $_GET['id'];
    $image = $_GET['image'];
    $deleteData = "DELETE FROM student WHERE id = $id";
    $result = mysqli_query($conn, $deleteData);
    if ($result) {
        echo "Deleted successfully";
        unlink('./images/students/' . $image);
        header("Location:" . SITE_URL . "getStudents.php");
    } else {
        echo "Not Deleted";
    }
}

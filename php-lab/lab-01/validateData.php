<?php
// include_once './getImage.php';

function validateData($conn)
{

    $nameErr = $emailErr = $genderErr = $courseErr = $batchErr = $imageErr = "";
    $name = $email = $gender = $course  = $batch = $image = "";
    if (isset($_POST['submit'])) {
        $nameErr = emptyCheck($_POST['name'], 'Name');
        $emailErr = emptyCheck($_POST['email'], 'Email');
        $genderErr = emptyCheck($_POST['gender'], 'Gender');
        $courseErr = emptyCheck($_POST['course'], 'Course');
        $batchErr = emptyCheck($_POST['batch'], 'Batch');
    }

    if (isset($_POST["name"])) {
        $name = test_input($_POST["name"]);
        if (!preg_match("/[a-zA-Z]+(\s[a-zA-Z]+)+/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    if (isset($_POST["email"])) {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (isset($_POST["gender"])) {
        $gender = test_input($_POST["gender"]);
    }

    if (isset($_POST["course"])) {
        $course = test_input($_POST["course"]);
    }

    if (isset($_POST["batch"])) {
        $batch = $_POST["batch"];
    }

    // if (isset($_POST["update"])) {
    //     if (isset($_POST["current_image"])) {
    //         $currentImage = $_POST["current_image"];
    //     }
    // }

    // $image = getImage();

    if (isset($_POST["update"])) {
        $current_image = $_POST["current_image"];
    }

    if (isset($_FILES["image"]["name"])) {
        $imageName = $_FILES["image"]["name"];
        $tmpImage = $_FILES["image"]["tmp_name"];
        $size = $_FILES["image"]["size"];
        $type = $_FILES["image"]["type"];
        $typeExt = explode('/', $type);
        $end = end($typeExt);
        $strLower = strtolower($end);
        // echo "<pre>";
        // print_r($_FILES);
        $format = ['jpg', 'jpeg', 'png'];
        // echo $image, $tmpImage, $size;
        // echo strtolower($end);
        if ($imageName === '') {
            if (isset($current_image)) {
                $image = $current_image;
            }
        } else if (!in_array($strLower, $format)) {
            $imageErr = "Image format is not supported";
        } else if ($size >= 5242880) {
            $imageErr = "Image size cannot be larger than 5 MB";
        } else {
            $nameExt = explode('.', $imageName);
            $nameEnd = end($nameExt);
            $imageName = 'Student-' . rand(1000, 9999) . '.' . $nameEnd;
            $destination = './images/students/' . $imageName;
            $upload = move_uploaded_file($tmpImage, $destination);

            if (!$upload) {
                $imageErr = "Image is not inserted";
            } else if ($upload && isset($current_image)) {
                if (file_exists('./images/students/' . $current_image)) {
                    unlink('./images/students/' . $current_image);
                    $image = $imageName;
                }
            } else {
                $image = $imageName;
            }
        }
    } else {
        $image = $current_image;
    }
    // echo $name . '  ' . $email . '  ' . $gender . '  ' . $course . '  ' . implode(",", $batch);

    $nameSuccess = $nameErr ? $nameErr : mysqli_real_escape_string($conn, $name);
    $emailSuccess = $emailErr ? $emailErr : mysqli_real_escape_string($conn, $email);
    $genderSuccess = $genderErr ? $genderErr : mysqli_real_escape_string($conn, $gender);
    $courseSuccess = $courseErr ? $courseErr : mysqli_real_escape_string($conn, $course);
    $batchImplode = $batch ? mysqli_real_escape_string($conn, implode(",", $batch)) : $batchErr;
    $imageSuccess = $imageErr ? $imageErr : mysqli_real_escape_string($conn, $image);

    // echo $nameSuccess . '  ' . $emailSuccess . '  ' . $genderSuccess . '  ' . $courseSuccess . '  ' . $batchImplode;
    $arr = ["name" => $nameSuccess, "email" => $emailSuccess, "gender" => $genderSuccess, "course" => $courseSuccess, "batch" => $batchImplode, "image" => $imageSuccess];
    return $arr;
}

function emptyCheck($name, $text)
{
    if (empty($name)) {
        $nameErr = $text . ' is required';
    }
    return $nameErr;
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = strip_tags($data);
    $data = htmlspecialchars($data);
    return $data;
}

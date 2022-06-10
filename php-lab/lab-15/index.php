<?php
session_start();
if (isset($_SESSION['auth'])) {
    $_SESSION['message'] = "You are already logged in";
    header('Location:user.php');
    exit(0);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Registration Process</title>
</head>

<body>
    <?php
    include_once './message.php';
    ?>
    <form action="registration.php" method="post" onsubmit="return formData()">
        <table>
            <tr>
                <td><label for="name">Name</label></td>
                <td>
                    <input type="text" name="name" id="name" onkeyup="validateName()">
                    <span id="name_err"></span>
                </td>
            </tr>
            <tr>
                <td><label for="username">Username</label></td>
                <td>
                    <input type="text" name="username" id="username" onkeyup="validateUsername()">
                    <span id="username_err"></span>
                </td>
            </tr>
            <tr>
                <td><label for="email">Email</label></td>
                <td>
                    <input type="email" name="email" id="email" onkeyup="validateEmail()">
                    <span id="email_err"></span>
                </td>
            </tr>
            <tr>
                <td><label for="password">Password</label></td>
                <td>
                    <input type="password" name="password" id="password" onkeyup="validatePassword()">
                    <span id="password_err"></span>
                </td>
            </tr>
            <tr>
                <td><label for="confirm_password">Confirm Password</label></td>
                <td>
                    <input type="password" name="confirm_password" id="confirm_password" onkeyup="validateConfirmPassword()">
                    <span id="confirm_password_err"></span>
                </td>
            </tr>
            <tr>
                <td><label for="contact">Contact No.</label></td>
                <td>
                    <input type="tel" name="contact" id="contact" onkeyup="validateContact()">
                    <span id="contact_err"></span>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="register" value="Register"></td>
            </tr>
        </table>
    </form>
    <script src="./script.js"></script>
</body>

</html>
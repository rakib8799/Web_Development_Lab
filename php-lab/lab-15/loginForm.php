<?php
session_start();
if (isset($_SESSION['auth'])) {
    if (!isset($_SESSION['message'])) {
        $_SESSION['message'] = "You are already logged in";
    }
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
    <title>PHP Login Process</title>
</head>

<body>
    <?php
    include_once './message.php';
    ?>
    <form action="login.php" method="post" onsubmit="return loginFormData()">
        <table>
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
                <td></td>
                <td><input type="submit" name="login" value="Login"></td>
            </tr>
        </table>
    </form>
    <script src="./script.js"></script>
</body>

</html>
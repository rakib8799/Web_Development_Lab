<?php
include_once './authentication.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Add Users</title>
</head>

<body>
    <?php
    include_once '../message.php';
    ?>
    <h4>Add User/Admin</h4>
    <a href="view_register.php">Back</a>
    <form action="code.php" method="post">
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
                <td><label for="contact">Contact No.</label></td>
                <td>
                    <input type="tel" name="contact" id="contact" onkeyup="validateContact()">
                    <span id="contact_err"></span>
                </td>
            </tr>
            <tr>
            <tr>
                <td><label for="role_as">Role as</label></td>
                <td>
                    <select name="role_as" id="role_as">
                        <option value="">--Select Role--</option>
                        <option value="0">User</option>
                        <option value="1">Admin</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="checkbox" name="status" id="status">
                    <label for="status">Status</label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="user_id" value="<?php echo $id ?>">
                </td>
                <td><input type="submit" name="add_user" value="Add User/Admin"></td>
            </tr>
        </table>
    </form>
    <script src="./script.js"></script>
</body>

</html>
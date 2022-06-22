<?php
include_once './authentication.php';
$id = $_GET['id'];
$sql = "SELECT * FROM users WHERE id = $id";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    extract($row);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Update Users</title>
</head>

<body>
    <form action="code.php" method="post">
        <table>
            <tr>
                <td><label for="name">Name</label></td>
                <td>
                    <input type="text" name="name" id="name" value="<?php echo $name; ?>" onkeyup="validateName()">
                    <span id="name_err"></span>
                </td>
            </tr>
            <tr>
                <td><label for="username">Username</label></td>
                <td>
                    <input type="text" name="username" id="username" value="<?php echo $username; ?>" onkeyup="validateUsername()">
                    <span id="username_err"></span>
                </td>
            </tr>
            <tr>
                <td><label for="email">Email</label></td>
                <td>
                    <input type="email" name="email" id="email" value="<?php echo $email; ?>" onkeyup="validateEmail()">
                    <span id="email_err"></span>
                </td>
            </tr>
            <!-- <tr>
                <td><label for="password">Password</label></td>
                <td>
                    <input type="text" name="password" id="password" value="<?php echo $password; ?>" onkeyup="validatePassword()">
                    <span id="password_err"></span>
                </td>
            </tr> -->
            <tr>
                <td><label for="contact">Contact No.</label></td>
                <td>
                    <input type="tel" name="contact" id="contact" value="<?php echo $contact; ?>" onkeyup="validateContact()">
                    <span id="contact_err"></span>
                </td>
            </tr>
            <tr>
            <tr>
                <td><label for="role_as">Role as</label></td>
                <td>
                    <select name="role_as" id="role_as">
                        <option value="">Select Role</option>
                        <option value="0" <?php if ($role_as === "0") {
                                                echo "selected";
                                            } ?>>User</option>
                        <option value="1" <?php if ($role_as === "1") {
                                                echo "selected";
                                            } ?>>Admin</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" name="status" id="status" <?php if ($status === "1") {
                                                                            echo "checked";
                                                                        } ?>>
                    <label for="status">Status</label>
                </td>
                <td></td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="user_id" value="<?php echo $id ?>">
                </td>
                <td><input type="submit" name="update_users" value="Update User"></td>
            </tr>
        </table>
    </form>
    <script src="./script.js"></script>
</body>

</html>
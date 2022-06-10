<?php
session_start();
require_once './config/db.php';
// extract($_POST);
extract($_SESSION['user']);
$sql = "SELECT * FROM users WHERE email='$email' && password='$password'";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);

if (isset($_SESSION['user_success'])) {
?>
    <p><?php echo $_SESSION['user_success'] ?></p>
<?php
}
// WHERE email='$email' && password='$password'
if ($count === 1) {
    $row = mysqli_fetch_assoc($result);
    extract($row);
?>
    <table>
        <tr>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
            <th>Contact No.</th>
        </tr>
        <tr>
            <td><?php echo $name; ?></td>
            <td><?php echo $username; ?></td>
            <td><?php echo $email; ?></td>
            <td><?php echo $password; ?></td>
            <td><?php echo $contact; ?></td>
            <td><a href="logout.php">Logout</a></td>
        </tr>
    </table>
<?php
}

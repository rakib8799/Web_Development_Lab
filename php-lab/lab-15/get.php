<?php
session_start();
require_once './config/db.php';
// extract($_POST);
if (isset($_SESSION['auth_user'])) {
    extract($_SESSION['auth_user']);
}
$sql = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);


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
            <th>Contact No.</th>
        </tr>
        <tr>
            <td><?php echo $name; ?></td>
            <td><?php echo $username; ?></td>
            <td><?php echo $email; ?></td>
            <td><?php echo $contact; ?></td>
            <td><a href="logout.php">Logout</a></td>
        </tr>
    </table>
<?php
}

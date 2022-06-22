<?php
// include_once './userAuthentication.php';
// include_once './message.php';
session_start();
require_once './config/db.php';
include_once './message.php';

if ($_SESSION['auth_role'] === '0') {
?>
    <h2>User Panel for <?php echo $_SESSION['auth_user']['name']; ?></h2>
    <a href="logout.php">Logout</a>
<?php
} else {
    $_SESSION['message'] = 'You are not allowed to login as USER';
    header("Location:" . SITE_URL . "admin/index.php");
    exit(0);
}
// }
?>
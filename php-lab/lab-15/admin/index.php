<?php
include_once './authentication.php';
include_once '../message.php';
?>
<h2>Admin Dashboard for <?php echo $_SESSION['auth_user']['name']; ?></h2>
<a href="../logout.php">Logout</a>
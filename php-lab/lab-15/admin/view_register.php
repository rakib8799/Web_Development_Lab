<?php
include_once './authentication.php';
include_once '../message.php';
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
?>
<h4>Registered Users</h4>
<a href="add_register.php">Add User/Admin</a>
<table>
    <tr>
        <th>S.N.</th>
        <th>Name</th>
        <th>Username</th>
        <th>Email</th>
        <th>Contact No.</th>
        <th>Roles</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php
    if ($count > 0) {
        $sn = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            extract($row);
    ?>
            <tr>
                <td><?php echo ++$sn . "."; ?></td>
                <td><?php echo $name; ?></td>
                <td><?php echo $username; ?></td>
                <td><?php echo $email; ?></td>
                <td><?php echo $contact; ?></td>
                <td>
                    <?php
                    if ($role_as === "1") {
                        echo "Admin";
                    } else {
                        echo "User";
                    }
                    ?>
                </td>
                <td><a href="edit_register.php?id=<?php echo $id; ?>">Edit</a></td>
                <td><a href="delete_register.php?id=<?php echo $id; ?>">Delete</a></td>
            </tr>
        <?php
        }
    } else {
        ?>
        <tr>
            <td colspan="7">No records found</td>
        </tr>
    <?php
    }
    ?>
</table>
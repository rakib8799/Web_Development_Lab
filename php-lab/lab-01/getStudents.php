<link rel="stylesheet" href="../css/style.css">
<?php
require_once '../config/db.php';
$selectData = "SELECT * FROM student";
$result = mysqli_query($conn, $selectData);
$count = mysqli_num_rows($result);
if ($count > 0) {
    $sn = 0;
?>
    <table>
        <tr>
            <th>S.N.</th>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Course</th>
            <th>Batch</th>
            <th>Image</th>
            <th>Current Date</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            $sn += 1;
            extract($row);

        ?>
            <tr>
                <td><?php echo $sn; ?></td>
                <td><?php echo $name; ?></td>
                <td><?php echo $email; ?></td>
                <td><?php echo $gender; ?></td>
                <td><?php echo $course; ?></td>
                <td><?php echo $batch; ?></td>
                <td>
                    <img src="./images/students/<?php echo $image; ?>" alt="" style="width: 50px">
                </td>
                <td><?php echo $currentDate; ?></td>
                <td><button><a href="<?php echo SITE_URL; ?>updateStudent.php?id=<?php echo $id ?>">Update</a></button></td>
                <td><button><a href="<?php echo SITE_URL; ?>deleteStudent.php?id=<?php echo $id ?>&&image=<?php echo $image; ?>">Delete</a></button></td>
            </tr>
        <?php
        }
        ?>
    </table>
    <br>
    <div style="text-align: center">
        <a href="<?php echo SITE_URL; ?>studentsProfile.php">Insert Student</a>
    </div>
<?php
}

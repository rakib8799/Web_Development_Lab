<?php
require_once '../config/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $selectData = "SELECT * FROM student WHERE id=" . $id;
    $result = mysqli_query($conn, $selectData);
    $count = mysqli_num_rows($result);

    if ($count === 1) {
        $row = mysqli_fetch_assoc($result);
        extract($row);
        // print_r($batch);
?>

        <head>
            <link rel="stylesheet" href="../css/style.css" />
            <title>Update Profile</title>
        </head>
        <section class="container">
            <form action="editStudent.php" method="post" enctype="multipart/form-data" onsubmit="return formData()">
                <table>
                    <tr class=" input-group">
                        <td><label for="name">Name</label></td>
                        <td><input type="text" name="name" id="name" value="<?php echo $name; ?>" onkeyup="validateName()">
                            <span id="name_err"></span>
                        </td>
                    </tr>
                    <tr class="input-group">
                        <td><label for="email">Email</label></td>
                        <td><input type="email" name="email" id="email" value="<?php echo $email; ?>" onkeyup="validateEmail()">
                            <span id="email_err"></span>
                        </td>
                    </tr>
                    <tr class="input-group">
                        <td>
                            <p>Gender</p>
                        </td>
                        <td>
                            <input type="radio" name="gender" id="male" value="male" <?php if ($gender === 'male') {
                                                                                            echo "checked";
                                                                                        }  ?> onclick="validateGender()">
                            <label for="male">Male</label>
                            <input type="radio" name="gender" id="female" value="female" <?php if ($gender === 'female') {
                                                                                                echo "checked";
                                                                                            }  ?> onclick="validateGender()">
                            <label for="female">Female</label>
                            <input type="radio" name="gender" id="others" value="others" <?php if ($gender === 'others') {
                                                                                                echo "checked";
                                                                                            }  ?> onclick="validateGender()">
                            <label for="others">Others</label>
                            <span id="gender_err"></span>
                        </td>
                    </tr>
                    <tr class='input-group'>
                        <td><label for="course">Course</label></td>
                        <td>
                            <select name="course" id="course" onchange="validateCourse()">
                                <option value="">Select Course</option>
                                <option value="bangla" <?php if ($course === "bangla") {
                                                            echo "selected";
                                                        } ?>>Bangla</option>
                                <option value="english" <?php if ($course === "english") {
                                                            echo "selected";
                                                        } ?>>English</option>
                                <option value="math" <?php if ($course === "math") {
                                                            echo "selected";
                                                        } ?>>Mathematics</option>
                            </select>
                            <span id='course_err'></span>
                        </td>
                    </tr>
                    <tr class='input-group'>
                        <td>
                            <p>Select Batch</p>
                        </td>
                        <td>
                            <?php
                            $arr = explode(",", $batch);
                            ?>
                            <input type="checkbox" name="batch[]" id="morning" value="morning" onclick="validateBatch()" <?php if (in_array("morning", $arr)) {
                                                                                                                                echo "checked";
                                                                                                                            } ?>>
                            <label for="morning">Morning</label>
                            <input type="checkbox" name="batch[]" id="afternoon" value="afternoon" onclick="validateBatch()" <?php if (in_array("afternoon", $arr)) {
                                                                                                                                    echo "checked";
                                                                                                                                } ?>>
                            <label for="afternoon">AfterNoon</label>
                            <input type="checkbox" name="batch[]" id="evening" value="evening" onclick="validateBatch()" <?php if (in_array("evening", $arr)) {
                                                                                                                                echo "checked";
                                                                                                                            } ?>>
                            <label for="evening">Evening</label>
                            <span id='batch_err'></span>
                        </td>
                    </tr>
                    <tr class='input-group'>
                        <td>
                            <label for="current_image">Current Image</label>
                        </td>
                        <td>
                            <img src="./images/students/<?php echo $image; ?>" alt="" style="width: 80px" id="current_image" />
                        </td>
                    </tr>
                    <tr class='input-group'>
                        <td>
                            <label for="image">Choose Image</label>
                        </td>
                        <td>
                            <input type="file" name="image" id="image" onchange="showPreview(event)?'':validateImage()" />
                            <span id="image_err"></span>
                        </td>
                        <td>
                            <img src="" alt="" id="preview_image" style="width:5vw;display:none">
                        </td>
                    </tr>
                    <tr class='input-group'>
                        <td>
                            <input type="hidden" name="id" value="<?php echo $id; ?>" />
                            <input type="hidden" name="current_image" value="<?php echo $image; ?>" />
                            <input type="submit" name="update" value="Update" />
                        </td>
                        <td>
                            <input type="reset" name="reset" value="Reset" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="<?php echo SITE_URL; ?>getStudents.php">Back To View Students</a>
                        </td>
                    </tr>
                </table>
            </form>
        </section>
        <script src="./script.js"></script>
<?php
    }
}

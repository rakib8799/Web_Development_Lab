<?php
require_once '../config/db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="../css/style.css" />
        <title>Student's Profile</title>
</head>

<body>
        <section class="container">
                <form action="insertStudent.php" method="post" enctype="multipart/form-data" onsubmit="return formData()">
                        <table>
                                <tr class='input-group'>
                                        <td>
                                                <label for="name">Name</label>
                                        </td>
                                        <td>
                                                <input type="text" name="name" id="name" onkeyup="validateName()" />
                                                <span id='name_err'></span>
                                        </td>
                                </tr>
                                <tr class='input-group'>
                                        <td>
                                                <label for="email">Email</label>
                                        </td>
                                        <td>
                                                <input type="email" name="email" id="email" onkeyup="validateEmail()" />
                                                <span id='email_err'></span>
                                        </td>
                                </tr>
                                <tr class='input-group'>
                                        <td>
                                                <p>Gender</p>
                                        </td>
                                        <td>
                                                <input type="radio" name="gender" id="male" value="male" onclick="validateGender()" />
                                                <label for="male">Male</label>
                                                <input type="radio" name="gender" id="female" value="female" onclick="validateGender()" />
                                                <label for="female">Female</label>
                                                <input type="radio" name="gender" id="others" value="others" onclick="validateGender()" />
                                                <label for="others">Others</label>
                                                <span id="gender_err"></span>
                                        </td>
                                </tr>
                                <tr class='input-group'>
                                        <td><label for="course">Course</label></td>
                                        <td>
                                                <select name="course" id="course" onchange="validateCourse()">
                                                        <option value="">Select Course</option>
                                                        <option value="bangla">Bangla</option>
                                                        <option value="english">English</option>
                                                        <option value="math">Mathematics</option>
                                                </select>
                                                <span id='course_err'></span>
                                        </td>
                                </tr>
                                <tr class='input-group'>
                                        <td>
                                                <p>Select Batch</p>
                                        </td>
                                        <td>
                                                <input type="checkbox" name="batch[]" id="morning" value="morning" onclick="validateBatch()">
                                                <label for="morning">Morning</label>
                                                <input type="checkbox" name="batch[]" id="afternoon" value="afternoon" onclick="validateBatch()">
                                                <label for="afternoon">AfterNoon</label>
                                                <input type="checkbox" name="batch[]" id="evening" value="evening" onclick="validateBatch()">
                                                <label for="evening">Evening</label>
                                                <span id='batch_err'></span>
                                        </td>
                                </tr>
                                <tr class='input-group'>
                                        <td><label for="image">Upload Image</label></td>
                                        <td>
                                                <input type="file" name="image" id="image" onchange="validateImage()" />
                                                <span id="image_err"></span>
                                        </td>
                                </tr>
                                <tr class='input-group'>
                                        <td>
                                                <input type="submit" name="submit" value="Submit" />
                                        </td>
                                        <td>
                                                <input type="reset" name="reset" value="Reset" />
                                        </td>
                                </tr>
                                <tr>
                                        <td>
                                                <a href="<?php echo SITE_URL; ?>getStudents.php">View All Students</a>
                                        </td>
                                </tr>
                        </table>
                </form>
        </section>
        <script src="./script.js"></script>
</body>

</html>
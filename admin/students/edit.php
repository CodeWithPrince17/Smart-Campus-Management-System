<?php
session_start();

include "../../includes/database.php";
include "../../includes/header.php";
include "../../includes/sidebar.php";

$student_id = $_GET['student_id'];

$sql = "SELECT * FROM students WHERE student_id='$student_id'";
$result = mysqli_query($conn, $sql);

$student = mysqli_fetch_assoc($result);
if(isset($_POST['update']))
{
    $roll_number = $_POST['roll_number'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $semester = $_POST['semester'];

    $sql = "UPDATE students SET
            roll_number='$roll_number',
            full_name='$full_name',
            email='$email',
            department='$department',
            semester='$semester'
            WHERE student_id='$student_id'";

    $result = mysqli_query($conn, $sql);

    if($result)
    {
        header("Location: index.php");
        exit();
    }
    else
    {
        echo "Update Failed!";
    }
}
?>

<div class="main-content">

    <h1>Edit Student</h1>

    <form method="POST">
        <label>Roll Number</label><br>
<input type="text" name="roll_number" value="<?php echo $student['roll_number']; ?>">
<br><br>

<label>Full Name</label><br>
<input type="text" name="full_name" value="<?php echo $student['full_name']; ?>">
<br><br>

<label>Email</label><br>
<input type="email" name="email" value="<?php echo $student['email']; ?>">
<br><br>

<label>Department</label><br>
<input type="text" name="department" value="<?php echo $student['department']; ?>">
<br><br>

<label>Semester</label><br>
<input type="number" name="semester" value="<?php echo $student['semester']; ?>">
<br><br>

<input type="submit" name="update" value="Update Student">

        <!-- Form fields will go here -->

    </form>

</div>

<?php
include "../../includes/footer.php";
?>
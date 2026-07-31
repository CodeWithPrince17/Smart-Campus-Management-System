<?php
session_start();

include "../../includes/database.php";
include "../../includes/header.php";
include "../../includes/sidebar.php";

$student_id = $_GET['student_id'];
if(isset($_POST['delete']))
{
    $sql = "DELETE FROM students WHERE student_id='$student_id'";

    mysqli_query($conn, $sql);

   header("Location: index.php?message=deleted");
    
   exit();
}

$sql = "SELECT * FROM students WHERE student_id='$student_id'";
$result = mysqli_query($conn, $sql);

$student = mysqli_fetch_assoc($result);
if(!$student)
{
    die("Student not found.");
}
?>

<div class="main-content">

<h1>Delete Student</h1>

<p>
Are you sure you want to delete
<strong><?php echo $student['full_name']; ?></strong>?
</p>

<form method="POST">

    <input type="submit" name="delete" value="Yes, Delete Student">

    <a href="index.php">Cancel</a>

</form>

</div>

<?php
include "../../includes/footer.php";
?>
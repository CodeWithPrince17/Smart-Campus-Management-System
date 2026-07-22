<?php
session_start();
include "../../includes/database.php";

$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Management</title>
</head>
<body>

<h1>Student Management</h1>

<a href="add.php">+ Add Student</a>

<br><br>

<table border="1" cellpadding="10">

<tr>
    <th>ID</th>
    <th>Roll No</th>
    <th>Name</th>
    <th>Email</th>
    <th>Department</th>
    <th>Semester</th>
    <th>Action</th>
</tr>

<?php

while($row = mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?php echo $row['student_id']; ?></td>

<td><?php echo $row['roll_number']; ?></td>

<td><?php echo $row['full_name']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['department']; ?></td>

<td><?php echo $row['semester']; ?></td>

<td>

<a href="edit.php?id=<?php echo $row['student_id']; ?>">Edit</a>

|

<a href="delete.php?id=<?php echo $row['student_id']; ?>">Delete</a>

</td>

</tr>

<?php
}
?>

</table>

<br>

<a href="../dashboard.php">Back to Dashboard</a>

</body>
</html>
<?php
session_start();
include "../../includes/database.php";



if(isset($_POST['save_student']))
{
    $full_name = $_POST['full_name'];
    $roll_number = $_POST['roll_number'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $department = $_POST['department'];
    $semester = $_POST['semester'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];

    $sql = "INSERT INTO students
    (full_name, roll_number, email, phone, department, semester, gender, dob, address)
    VALUES
    ('$full_name', '$roll_number', '$email', '$phone', '$department', '$semester', '$gender', '$dob', '$address')";

    if(mysqli_query($conn, $sql))
    {
        echo "<script>alert('Student Added Successfully');</script>";
    }
    else
    {
        echo "<script>alert('Error Adding Student');</script>";
    }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="stylesheet" href="../../css/styles.css">
</head>
<body>

<h1>Add Student</h1>

<form action="" method="POST">

    <label>Full Name</label><br>
    <input type="text" name="full_name" required><br><br>

    <label>Roll Number</label><br>
    <input type="text" name="roll_number" required><br><br>

    <label>Email</label><br>
    <input type="email" name="email" required><br><br>

    <label>Phone</label><br>
    <input type="text" name="phone"><br><br>

    <label>Department</label><br>
    <input type="text" name="department"><br><br>

    <label>Semester</label><br>
    <input type="number" name="semester"><br><br>

    <label>Gender</label><br>
    <select name="gender">
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Other">Other</option>
    </select><br><br>

    <label>Date of Birth</label><br>
    <input type="date" name="dob"><br><br>

    <label>Address</label><br>
    <textarea name="address"></textarea><br><br>

    <button type="submit" name="save_student">
        Save Student
    </button>

</form>

<br>

<a href="index.php">← Back to Student List</a>

</body>
</html>
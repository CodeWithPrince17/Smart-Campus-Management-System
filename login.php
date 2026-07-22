<?php
session_start();
include "includes/database.php";


if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1)
    {
        $user = mysqli_fetch_assoc($result);

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name'] = $user['full_name'];
        $_SESSION['role'] = $user['role'];

        if($user['role'] == "admin")
        {
            header("Location: admin/dashboard.php");
        }
        elseif($user['role'] == "teacher")
        {
            header("Location: teacher/dashboard.php");
        }
        else
        {
            header("Location: student/dashboard.php");
        }

        exit();
    }
    else
    {
        echo "<script>alert('Invalid Email or Password');</script>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Smart Campus Management System</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="login-box">
    <h2>Login</h2>

    <form action="" method="POST">

        <input type="email"
               name="email"
               placeholder="Enter Email"
               required>

        <input type="password"
               name="password"
               placeholder="Enter Password"
               required>

        <button type="submit" name="login">
            Login
        </button>

    </form>

</div>

</body>
</html>
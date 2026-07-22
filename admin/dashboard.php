<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>

<h1>Welcome Admin</h1>

<p>Hello <?php echo $_SESSION['name']; ?></p>

<a href="../logout.php">Logout</a>

</body>
</html>
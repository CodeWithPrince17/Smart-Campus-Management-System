<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>
</head>
<body>

<h1>Welcome Student</h1>

<p>Hello <?php echo $_SESSION['name']; ?></p>

</body>
</html>
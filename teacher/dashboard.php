<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Teacher Dashboard</title>
</head>
<body>

<h1>Welcome Teacher</h1>

<p>Hello <?php echo $_SESSION['name']; ?></p>

</body>
</html>
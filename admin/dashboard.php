<?php
session_start();

include "../includes/header.php";
include "../includes/sidebar.php";


$sql = "SELECT COUNT(*) AS total_students FROM students";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$total_students = $row['total_students'];


?>

<div class="main-content">
    <div class="cards">

<div class="card">
<h2>Students</h2>
<p><?php echo $total_students; ?></p>
</div>

<div class="card">
<h2>Teachers</h2>
<p>0</p>
</div>

<div class="card">
<h2>Departments</h2>
<p>0</p>
</div>

<div class="card">
<h2>Attendance</h2>
<p>0%</p>
</div>

</div>

<h1>Dashboard</h1>

<br>

<h3>Welcome <?php echo $_SESSION['name']; ?></h3>

<br>

<p>This is the Smart Campus Management System.</p>

</div>

<?php
include "../includes/footer.php";
?>
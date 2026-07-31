<?php
session_start();

include "../../includes/database.php";
include "../../includes/header.php";
include "../../includes/sidebar.php";

if(isset($_GET['search']) && $_GET['search'] != "")
{
    $search = $_GET['search'];

    $sql = "SELECT * FROM students
            WHERE full_name LIKE '%$search%'
            OR roll_number LIKE '%$search%'
            OR department LIKE '%$search%'";
}
else
{
    $sql = "SELECT * FROM students";
}

$result = mysqli_query($conn, $sql);
?>

<div class="main-content">
    <?php
if(isset($_GET['message']))
{
    if($_GET['message'] == "added")
    {
        echo "<div class='success-message'>✅ Student added successfully.</div>";
    }

    if($_GET['message'] == "updated")
    {
        echo "<div class='success-message'>✏️ Student updated successfully.</div>";
    }

    if($_GET['message'] == "deleted")
    {
        echo "<div class='success-message'>🗑️ Student deleted successfully.</div>";
    }
}
?>

    <h1>👨‍🎓 Student Management</h1>

    <br>

   <form method="GET">

    <input
        type="text"
        name="search"
        class="search-box"
        placeholder="🔍 Search by Name, Roll No or Department"
        value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">

    <input
        type="submit"
        value="Search"
        class="btn btn-edit">

</form>

    <a href="add.php" class="btn btn-add">
        + Add Student
    </a>

    <div class="table-container">

        <table class="student-table">

            <thead>

                <tr>
                    <th>ID</th>
                    <th>Roll No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Semester</th>
                    <th>Action</th>
                </tr>

            </thead>

            <tbody>

                <?php while($row = mysqli_fetch_assoc($result)) { ?>

                <tr>

                    <td><?php echo $row['student_id']; ?></td>

                    <td><?php echo $row['roll_number']; ?></td>

                    <td><?php echo $row['full_name']; ?></td>

                    <td><?php echo $row['email']; ?></td>

                    <td><?php echo $row['department']; ?></td>

                    <td><?php echo $row['semester']; ?></td>

                    <td>

                        <a
                            href="edit.php?student_id=<?php echo $row['student_id']; ?>"
                            class="btn btn-edit">
                            ✏ Edit
                        </a>

                        <a
                            href="delete.php?student_id=<?php echo $row['student_id']; ?>"
                            class="btn btn-delete">
                            🗑 Delete
                        </a>

                    </td>

                </tr>

                <?php } ?>

            </tbody>

        </table>

    </div>

    <br>

    <a href="../dashboard.php">← Back to Dashboard</a>

</div>

<?php
include "../../includes/footer.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Campus Management System</title>

    <link rel="stylesheet" href="/website/css/styles.css">
</head>

<body>

<header class="top-header">

    <h2>🎓 Smart Campus Management System</h2>

    <div>

        Welcome,
        <strong>
            <?php echo $_SESSION['name']; ?>
        </strong>

        |

        <a href="/website/logout.php">Logout</a>

    </div>

</header>
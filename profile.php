<?php
// Start session
session_start();

include 'connection.php';

// Get user details from database
$user_id = $_SESSION['id'];
$query = "SELECT * FROM user WHERE ID = $user_id";
$result = $conn->query($query);
$user = $result->fetch_assoc();

// Close database connection
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profilo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php
    include_once 'navBar.php';
    $navBar = new navBar();
    $navBar->getRender();
    ?>
    <div class="container">
        <p>Userame: <?php echo $user['Username']; ?></p>
        <p>Email: <?php echo $user['EMail']; ?></p>
        <p>Telefono: <?php echo $user['Telefono']; ?></p>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
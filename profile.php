<?php
// Start session
session_start();

include 'connection.php';
include 'config.php';

// Get user details from database
$user_id = $_SESSION['id'];
$query = "SELECT * FROM ".$prefix."user WHERE ID = $user_id";
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
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Userame</h5>
                        <p class="card-text"><?php echo $user['Username']; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Email</h5>
                        <p class="card-text"><?php echo $user['EMail']; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Telefono</h5>
                        <p class="card-text"><?php echo $user['Telefono']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1){
        echo '<a href="admin.php">Pannello di controllo</a>';
    }
    ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
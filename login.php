<?php
session_abort();
session_start();

if (isset ($_GET['error'])) {
    $error = $_GET['error'];
    if ($error == 1) {
        $message = "Username o Password errati!";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login E-Commerce</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-group text-center">
                    <h1>Login</h1>
                </div>
                <form action="chkLogin.php" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
                <div class="form-group text-center">
                    <a href="register.php">Registrati</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Include Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
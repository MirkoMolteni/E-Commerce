<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <!-- <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="">E-Commerce</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse ml-auto" id="navbarNav">
                <ul class="navbar-nav">
                    <?php
                    // if(isset($_SESSION['username'])) {
                    //     echo '<li class="nav-item">
                    //             <a class="nav-link" href="profile.php">'.$_SESSION['username'].'</a>
                    //           </li>';
                    //     echo '<li class="nav-item">
                    //             <a class="nav-link" href="logout.php">Logout</a>
                    //           </li>';
                    // } else {
                    //     echo '<li class="nav-item">
                    //             <a class="nav-link" href="login.php">Login</a>
                    //           </li>
                    //           <li class="nav-item">
                    //             <a class="nav-link" href="register.php">Register</a>
                    //           </li>';
                    // }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="carrello.php">Carello</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div> -->

    <?php
    include_once 'navBar.php';
    $navBar = new navBar();
    $navBar->getRender();
    include_once 'galleria.php';
    $prodotti = Galleria::getProdotti();
    echo Galleria::render($prodotti);
    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
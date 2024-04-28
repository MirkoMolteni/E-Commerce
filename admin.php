<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php
    include_once 'navBar.php';
    $navBar = new navBar();
    $navBar->getRender();
    ?>
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <a href="creaProdotto.php" class="btn btn-primary">Aggiungi un prodotto al magazzino</a>
            </div>
            <div class="col-md-4">
                <a href="modificaGiacenze.php" class="btn btn-primary">Aggiorna le giacenze di un prodotto</a>
            </div>
            <div class="col-md-4">
                <a href="eliminaProdotto.php" class="btn btn-primary">Elimina un prodotto dal magazzino</a>
            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</body>

</html>
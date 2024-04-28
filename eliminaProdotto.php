<?php
session_start();
include 'connection.php';
include 'config.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM ".$prefix."prodotto WHERE ID = $id";
    if ($conn->query($query) === TRUE) {
        echo "<script>alert('Prodotto eliminato con successo');</script>";
    } else {
        echo "<script>alert('Errore');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elimina prodotto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <?php
    include_once 'navBar.php';
    $navBar = new navBar();
    $navBar->getRender();
    ?>
    <div class="container">
        <h1>Elimina prodotto</h1>
        <form action="eliminaProdotto.php" method="GET">
            <div class="form-group">
                <label for="id">ID Prodotto</label>
                <?php
                $query = "SELECT * FROM ".$prefix."prodotto";
                $result = $conn->query($query);
                echo '<select name="id" class="form-control">';
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['ID'] . '">'.$row['ID'].' - ' . $row['Nome'] . '</option>';
                    }
                    
                echo '</select>';
                ?>
            </div>
            <button type="submit" class="btn btn-primary">Elimina</button>
        </form>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</body>

</html>
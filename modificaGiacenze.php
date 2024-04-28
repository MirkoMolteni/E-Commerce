<?php
session_start();
include 'connection.php';
include 'config.php';
if (isset($_GET['id']) && isset($_GET['quantitaProdotto'])) {
    $id = $_GET['id'];
    $quantitaProdotto = $_GET['quantitaProdotto'];
    $query = "UPDATE " . $prefix . "prodotto SET Quantita = $quantitaProdotto WHERE ID = $id";
    if ($conn->query($query) === TRUE) {
        echo "<script>alert('Giacenze modificate con successo');</script>";
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
    <title>Modifica giacenze</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <?php
    include_once 'navBar.php';
    $navBar = new navBar();
    $navBar->getRender();
    ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="modificaGiacenze.php" method="GET">
                    <div class="form-group">
                        <label for="id">ID del prodotto:</label>
                        <?php
                        $query = "SELECT * FROM " . $prefix . "prodotto";
                        $result = $conn->query($query);
                        echo '<select name="id" class="form-control">';
                        while ($row = $result->fetch_assoc()) {
                            echo '<option value="' . $row['ID'] . '">' . $row['ID'] . ' - ' . $row['Nome'] . '</option>';
                        }

                        echo '</select>';
                        ?>
                    </div>
                    <div class="form-group
                    <label for=" quantitaProdotto">Quantità del prodotto:</label>
                        <input type="number" name="quantitaProdotto" id="quantitaProdotto" class="form-control"
                            required>
                    </div>
                    <button type="submit" class="btn btn-primary">Modifica giacenze</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</body>

</html>
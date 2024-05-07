<?php
session_start();
include "connection.php";
include "navBar.php";
include "config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acquista</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</head>

<body>
    <?php
    $navBar = new navBar();
    $navBar->getRender();
    ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="chkAcquisto.php" method="post">
                    <h2>Informazioni di spedizione</h2>
                    <div class="form-group">
                        <label for="indirizzo">Indirizzo</label>
                        <input type="text" id="indirizzo" name="indirizzo" class="form-control" required>
                    </div>

                    <h2>Dati di acquisto</h2>
                    <h3>Scegli una carta</h3>
                    <?php
                    $query = "SELECT * FROM ".$prefix."pagamento WHERE idUtente = " . $_SESSION['id'];
                    $result = $conn->query($query);
                    echo "<div class='form-group'>";
                    echo "<select name='carta' class='form-control'>";
                    echo "<option value=''>Nessuna</option>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['ID'] . "'>" . $row['NumeroCarta'] . "</option>";
                    }
                    echo "</select>";
                    echo "</div>";
                    ?>
                    <h3>Oppure inseriscine una nuova</h3>
                    <div class="form-group">
                        <label for="numeroCarta">Numero carta</label>
                        <input type="text" id="numeroCarta" name="numeroCarta" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="scadenza">Scadenza</label>
                        <input type="date" id="scadenza" name="scadenza" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="cvv">CVV</label>
                        <input type="text" id="cvv" name="cvv" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">Acquista</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
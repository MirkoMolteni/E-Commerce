<?php
session_start();
include 'config.php';
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}
if(isset($_GET["acquistato"]))
{
    echo '<script>alert("Acquisto effettuato con successo")</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrello</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <?php
    include_once 'navBar.php';
    $navBar = new navBar();
    $navBar->getRender();
    include 'connection.php';
    $idUser = $_SESSION['id'];
    $sql = "SELECT ID FROM ".$prefix."carrello WHERE idUtente = $idUser AND Acquistato = 0";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        ?>
        <div class="container">
            <div class="row">
                <?php
                $row = $result->fetch_assoc();
                $idCarrello = $row['ID'];
                $_SESSION['idCarrello'] = $idCarrello;
                $sql = "SELECT * FROM ".$prefix."aggiunta WHERE idCarrello = $idCarrello";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $idProdotto = $row['idProdotto'];
                        $quantita = $row['Quantita'];
                        $sql = "SELECT * FROM ".$prefix."prodotto WHERE ID = $idProdotto";
                        $resultProdotto = $conn->query($sql);
                        if ($resultProdotto->num_rows > 0) {
                            $rowProdotto = $resultProdotto->fetch_assoc();
                            ?>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $rowProdotto['Nome']; ?></h5>
                                        <?php
                                        $query = "SELECT Path FROM ".$prefix."foto WHERE idProdotto = " . $rowProdotto['ID'];
                                        $result2 = $conn->query($query);
                                        $foto = $result2->fetch_assoc();
                                        echo '<img src="img/' . $foto['Path'] . '" class="card-img-top" alt="...">';
                                        ?>
                                        <p class="card-text">Quantità: <?php echo $quantita; ?></p>
                                        <p class="card-text">Prezzo: <?php echo $rowProdotto['Prezzo']; ?></p>
                                        <a href="removeProdotto.php?idProdotto=<?php echo $idProdotto; ?>" class="btn btn-primary">Rimuovi</a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                } else {
                    echo 'Carrello vuoto';
                }
                ?>
            </div>
            <br>
            <div class="col-md-4 mx-auto ">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Totale</h5>
                        <?php
                        $sql = "SELECT SUM(".$prefix."prodotto.Prezzo * ".$prefix."aggiunta.Quantita) AS Totale FROM ".$prefix."prodotto INNER JOIN ".$prefix."aggiunta ON ".$prefix."prodotto.ID = ".$prefix."aggiunta.idProdotto WHERE idCarrello = $idCarrello";
                        $resultTotale = $conn->query($sql);
                        if ($resultTotale->num_rows > 0) {
                            $rowTotale = $resultTotale->fetch_assoc();
                            echo '<p class="card-text">Totale: ' . $rowTotale['Totale'] . '</p>';
                        }
                        ?>
                        <a href="acquista.php" class="btn btn-primary">Acquista</a>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } else {
        echo "<div class='container' style='text-align: center; margin-top: 200px;'><h1>Carrello vuoto</h1></div>";
    }
    ?>
    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
<?php
session_start();
include 'connection.php';
include 'config.php';
if(isset($_GET['nomeProdotto']) && isset($_GET['descrizioneProdotto']) && isset($_GET['prezzoProdotto']) && isset($_GET['quantitaProdotto']) && isset($_GET['immagineProdotto'])){
    $nomeProdotto = $_GET['nomeProdotto'];
    $descrizioneProdotto = $_GET['descrizioneProdotto'];
    $prezzoProdotto = $_GET['prezzoProdotto'];
    $quantitaProdotto = $_GET['quantitaProdotto'];
    $pathProdotto = $_GET['immagineProdotto'];

    // $query = "INSERT INTO ".$prefix."prodotto ('ID', 'Nome', 'Descrizione', 'Quantita', 'Prezzo', 'DataAggiunta') VALUES (NULL, ?, ?, ?, ?, current_timestamp())";
    $query = "INSERT INTO ".$prefix."prodotto (`ID`, `Nome`, `Descrizione`, `Quantita`, `Prezzo`, `DataAggiunta`) VALUES (NULL, ?, ?, ?, ?, current_timestamp())";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssii", $nomeProdotto, $descrizioneProdotto, $quantitaProdotto, $prezzoProdotto);
    $stmt->execute();
    $idProdotto = $stmt->insert_id;

    $query = "INSERT INTO ".$prefix."foto (`ID`, `Descrizione`, `Nome`, `Path`, `idProdotto`) VALUES (NULL, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssi", $descrizioneProdotto, $nomeProdotto, $pathProdotto, $idProdotto);
    $stmt->execute();

    
    if ($stmt->affected_rows > 0) {
        echo '<script>alert("Prodotto creato con successo!");</script>';
    } else {
        echo '<script>alert("Errore durante la creazione del prodotto.");</script>';
    }
    
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crea prodotto</title>
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
                <form action="creaProdotto.php" method="GET">
                    <div class="form-group">
                        <label for="nomeProdotto">Nome del prodotto:</label>
                        <input type="text" name="nomeProdotto" id="nomeProdotto" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="descrizioneProdotto">Descrizione del prodotto:</label>
                        <input type="text" name="descrizioneProdotto" id="descrizioneProdotto" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="prezzoProdotto">Prezzo del prodotto:</label>
                        <input type="number" name="prezzoProdotto" id="prezzoProdotto" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="quantitaProdotto">Quantità del prodotto:</label>
                        <input type="number" name="quantitaProdotto" id="quantitaProdotto" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="immagineProdotto">Immagine del prodotto:</label>
                        <input type="file" name="immagineProdotto" id="immagineProdotto" class="form-control" accept="image/*" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Crea prodotto</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
<?php
session_start();
include "connection.php";
include "config.php";

$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$indirizzo = $_POST['indirizzo'];
$citta = $_POST['citta'];
$cap = $_POST['cap'];
if (isset($_POST['carta']) && $_POST['carta'] != "") {
    $idCarta = $_POST['carta'];
} else {
    $numeroCarta = $_POST['numeroCarta'];
    $scadenza = $_POST['scadenza'];
    $cvv = $_POST['cvv'];
    $salva = $_POST['salva'];
    $query = "INSERT INTO ".$prefix."pagamento (`ID`, `NumeroCarta`, `Scadenza`, `CVV`, `idUtente`) VALUES (NULL, ?, ?, ?, " . $_SESSION["id"] . ")";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssi", $numeroCarta, $scadenza, $cvv);
    $stmt->execute();
    $idCarta = $conn->insert_id;
}
$query = "INSERT INTO ".$prefix."ordine (`ID`, `Stato`, `Indirizzo`, `DataAggiunta`, `idCarrello`, `idPagamento`) VALUES (NULL, 'Acquistato', ?, current_timestamp(), ".$_SESSION["idCarrello"].", ".$idCarta.")";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $indirizzo);
$stmt->execute();

$query = "UPDATE ".$prefix."carrello SET Acquistato = 1 WHERE ID = ".$_SESSION["idCarrello"];
$conn->query($query);
header("Location: carrello.php?acquisto=1");
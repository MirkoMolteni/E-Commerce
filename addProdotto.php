<?php
session_start();
include 'connection.php';
include 'config.php';
$idUser = $_SESSION['id'];
$idProdotto = $_POST['idProdotto'];
$quantita = $_POST['quantita'];
$sql = "SELECT ID FROM ".$prefix."carrello WHERE idUtente = $idUser";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $idCarrello = $row['ID'];
    $sql = "SELECT * FROM ".$prefix."prodotto WHERE ID = $idProdotto";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $quantitaDisponibile = $row['Quantita'];
        if ($quantitaDisponibile >= $quantita) {
            $sql = "SELECT * FROM ".$prefix."aggiunta WHERE idProdotto = $idProdotto AND idCarrello = $idCarrello";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $quantitaCarrello = $row['Quantita'];
                $quantitaCarrello += $quantita;
                $sql = "UPDATE ".$prefix."aggiunta SET Quantita = $quantitaCarrello WHERE idProdotto = $idProdotto AND idCarrello = $idCarrello";
                $conn->query($sql);
            } else {
                $sql = "INSERT INTO ".$prefix."aggiunta (idProdotto, idCarrello, quantita) VALUES ($idProdotto, $idCarrello, $quantita)";
                $conn->query($sql);
            }
            $quantitaDisponibile -= $quantita;
            $sql = "UPDATE ".$prefix."prodotto SET quantita = $quantitaDisponibile WHERE ID = $idProdotto";
            $conn->query($sql);
            header('Location: carrello.php');
        } else {
            echo 'Quantità non disponibile';
        }
    } else {
        echo 'Prodotto non trovato';
    }
} else {
    // echo 'Carrello non trovato';
    $sql = "INSERT INTO carrello (idUtente) VALUES ($idUser)";
    $conn->query($sql);
    header('Location: addProdotto.php');
}
?>
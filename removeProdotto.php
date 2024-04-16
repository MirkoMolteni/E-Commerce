<?php
session_start();
include 'connection.php';
$idProdotto = $_GET['idProdotto'];
$idUser = $_SESSION['id'];
$sql = "SELECT ID FROM carrello WHERE idUtente = $idUser";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $idCarrello = $row['ID'];

    $sql = "SELECT quantita FROM aggiunta WHERE idCarrello = $idCarrello AND idProdotto = $idProdotto";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $quantita = $row['quantita'];

    $sql = "UPDATE prodotto SET quantita = quantita + $quantita WHERE ID = $idProdotto";
    if ($conn->query($sql) === TRUE) {
        $sql = "DELETE FROM aggiunta WHERE idCarrello = $idCarrello AND idProdotto = $idProdotto";
        if ($conn->query($sql) === TRUE) {
            header('Location: carrello.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
<?php
session_start();
include 'connection.php';
include 'config.php';
$username = $_POST['username'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = md5($_POST['password']);
$stmt = $conn->prepare("INSERT INTO ".$prefix."user (username, email, telefono, password) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $username, $email, $phone, $password);
$stmt->execute();
header('Location: login.php');
?>
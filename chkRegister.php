<?php
session_start();
include 'connection.php';
$username = $_POST['username'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = md5($_POST['password']);
$stmt = $conn->prepare("INSERT INTO user (username, email, telefono, password) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $username, $email, $phone, $password);
$stmt->execute();
header('Location: login.php');
?>
<?php
session_start();
include 'connection.php';
$username = $_POST['username'];
$password = md5($_POST['password']);
$stmt = $conn->prepare("SELECT * FROM user WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION['username'] = $row['Username'];
    $_SESSION['id'] = $row['ID'];
    $_SESSION['email'] = $row['EMail'];
    $_SESSION['admin'] = $row['Admin'];
    header('Location: index.php');
} else {
    header('Location: login.php?error=1');
}
?>
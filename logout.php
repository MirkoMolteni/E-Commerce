<?php
session_start();

// Destroy all session data
session_destroy();

// Redirect to login page or any other page
header("Location: index.php");
exit;
?>
<?php
session_start();

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Optional: Clear cookies
setcookie(session_name(), '', time() - 3600, '/');

// Redirect to the login page (or homepage)
header("Location: ../website/index.php");
exit();
?>

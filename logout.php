<?php
session_start();
session_unset();  // Unset all session variables
session_destroy();  // Destroy the session
header("Location: home.php");  // Redirect to the home page or any other page
exit;
?>
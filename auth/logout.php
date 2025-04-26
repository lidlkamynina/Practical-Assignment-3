<?php
session_start();      // Start session if not already started
session_unset();      // Remove all session variables
session_destroy();    // Destroy the session

// Optionally delete the cookies too
// setcookie('username', '', time() - 3600, '/');
// setcookie('last_visit', '', time() - 3600, '/');

// Redirect to login page
header('Location: login.php');
exit();
?>

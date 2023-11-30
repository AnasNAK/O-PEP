<?php
// Start the session
session_start();



unset($_SESSION['user_email']);


// Destroy the session
session_destroy();

// Redirect to the login page
header("Location: ../view/SingIn.php");
exit;
?>

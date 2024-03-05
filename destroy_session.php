<?php
session_start();

// Check if the logout form has been submitted
if (isset($_POST['logout'])) {
    // Clear all session variables
    session_unset();

    // Destroy the session data
    session_destroy();

    // Redirect to the login page or any other desired page
    header("Location:login.php");
    exit();
}
?>
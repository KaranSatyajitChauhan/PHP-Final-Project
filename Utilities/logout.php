<?php
// Start the session
session_start();

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect the user to the login page (make sure this path is correct)
header("Location: ../Views/login.php"); // Adjust this path based on your folder structure
exit(); // Always use exit after header to stop further execution

function logout() {
    // Unset all session variables
    session_unset();

    // Destroy the session
    session_destroy();

    // Redirect to the login page
    header("Location: ../Views/login.php");
    exit(); // Always use exit after header to stop further execution
}
?>

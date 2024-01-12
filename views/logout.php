<?php
    session_start();

    // Unset all session variables
    $_SESSION = [];
    
    // Destroy the session
    session_destroy();
    
    // Redirect the user to the login page or any other page
    header('Location: ../index.php');
?>
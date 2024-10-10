<?php
    // Remove user from the session
    unset($_SESSION["user"]);

    // Send a success message to the user for a successful logout, whilst redirecting them back to the homepage
    setSuccess("Successfully logged out!", "/");
?>
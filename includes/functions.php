<?php
    // Function to connect to the database.
    function connectToDB() {
        // Setup database credential.
        $host = 'localhost'; // For Windows user.
        $database_name = "pet_adoption_platform"; // Connecting to a specific database.
        $database_user = "root"; // MySQL username.
        $database_password = "123"; // MySQL password.
        // Connect to database (PDO - PHP database object).
        $database = new PDO(
            "mysql:host=$host;dbname=$database_name",
            $database_user, 
            $database_password 
        );
        return $database;
    }

    // Function to set success messages.
    function setSuccess($success_message, $redirect_page){
        $_SESSION['success'] = $success_message;
        // Redirect user to required page.
        header("Location: ".$redirect_page);
        exit;
    }

    // Function to set error messages.
    function setError($error_message, $redirect_page){
        $_SESSION['error'] = $error_message;
        // Redirect user to required page.
        header("Location: ".$redirect_page);
        exit;
    }

    // Check if user is not logged in.
    function checkIfuserIsNotLoggedIn($error_message, $redirect_page){
        if(!isset($_SESSION["user"])){
            setError($error_message, $redirect_page);
        }
    }
    
    // Check if user is not admin.
    function checkIfIsNotAdmin($error_message, $redirect_page){
        if(isset($_SESSION["user"]) && ($_SESSION["user"]["role"] !== "admin")){
            setError($error_message, $redirect_page);
        }
    }
?>
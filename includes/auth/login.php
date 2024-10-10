<?php
    // Connecting to the database.
    $database = connectToDB();

    // Get the user entered data from the login page.
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Check if the email entered is already in the database.
    // SQL Command.
    $sql = "SELECT * FROM users WHERE email = :email";
    // Prepare the SQL query.
    $query = $database->prepare($sql);
    // Execute the SQL query.
    $query->execute([
        'email' => $email
    ]);
    // Fetch the table row from the database containing the first matching result.
    $user = $query->fetch();

    // Check if the user exists in the database.
    if ($user){
        // Check if the password is correct.
        if (password_verify($password, $user["password"])){
            // Login the user if password is correct.
            $_SESSION["user"] = $user;
            // Send a success message for a successful login to the user whilst redirect them back to the homepage.
            setSuccess("Welcome back, " . $_SESSION["user"]["name"] . "!", "/dashboard");

        // Send an error message if the password is wrong.
        } else {
            setError("Your password is incorrect, try again!", "/login");
        }

    // Send an error message if the email is not in the database.
    } else {
        setError("This email does not exist, try again!", "/login");
    }
?>
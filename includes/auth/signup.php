<?php
    // Connecting to the database.
    $database = connectToDB();

    // Get the user entered data from the signup page.
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone_number = $_POST["phone-number"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm-password"];

    // Check if the user's password matches the confirm password.
    if ($password !== $confirm_password){
        setError("Your password does not match the confirmation!", "/signup");

    // Check if the password is at least 8 characters long or more.
    } else if (strlen($password) < 8){
        setError("Your password must be 8 characters long or more!", "/signup");

    // Update the database with the new user details if all the above checks have passed.
    } else {
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
        $user_email = $query->fetch();

        // Check if the phone number entered is already in the database.
        // SQL Command.
        $sql = "SELECT * FROM users WHERE phone_number = :phone_number";
        // Prepare the SQL query.
        $query = $database->prepare($sql);
        // Execute the SQL query.
        $query->execute([
            'phone_number' => $phone_number
        ]);
        // Fetch the table row from the database containing the first matching result.
        $user_phone_number = $query->fetch();

        // Send an error message if both the email and phone number are found in the database.
        if ($user_email && $user_phone_number){
            setError("This email and phone number are already in use!", "/signup");
        

        } else if($user_email){
            setError("This email is already in use!", "/signup");

        } else if($user_phone_number){
            setError("This phone number is already in use!", "/signup");

        // Process sign up if the email and phone number is not found in the database.
        } else {
            // SQL Command.
            $sql = "INSERT INTO users (`name`, `email`, `phone_number`, `password`) VALUES (:name, :email, :phone_number, :password)";
            // Prepare the SQL query.
            $query = $database->prepare($sql);
            // Execute the SQL query.
            $query->execute([
                'name' => $name,
                'email' => $email,
                'phone_number' => $phone_number,
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ]);
            
            // Send a success message for a successful account creation to the user, redirecting them to the login page.
            setSuccess("Account has been successfully created!<br>You may login with your set credentials.", "/login");
        }
    }
?>
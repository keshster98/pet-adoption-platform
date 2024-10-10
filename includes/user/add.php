<?php
    // Connecting to the database
    $database = connectToDB();

    // Get the user entered data from the add new user page.
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone_number = $_POST["phone-number"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm-password"];
    $role = $_POST["role"];

    // Check if the user's password matches the confirm password.
    if ($password !== $confirm_password){
        setError("The user password does not match the confirmation!", "/manage-users-add");

    // Check if the password is at least 8 characters long or more.
    } else if (strlen( $password) < 8){
        setError("The user password must be 8 characters long or more!", "/manage-users-add");

    // Update the database with the new user details if all the above checks have passed.
    } else {  
        // Check if the email entered is already in the database.
        // SQL Command.
        $sql = "SELECT * FROM users where email = :email";
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
        $sql = "SELECT * FROM users where phone_number = :phone_number";
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
            setError("This email and phone number are already in use!", "/manage-users-add");
        
        // Send an error message if the email is found in the database.
        } else if($user_email){
            setError("This email is already in use!", "/manage-users-add");
        
        // Send an error message if the phone number is found in the database.
        } else if($user_phone_number){
            setError("This phone number is already in use!", "/manage-users-add");

        } else {
            // Add user into the database.
            // SQL command.
            $sql = "INSERT INTO users (`name`,`email`,`phone_number`,`password`,`role`) VALUES (:name, :email, :phone_number, :password, :role)";
            // Prepare the SQL query.
            $query = $database->prepare($sql);
            // Execute the SQL query.
            $query->execute([
                "name" => $name,
                "email" => $email,
                "phone_number" => $phone_number,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'role' => $role
            ]);

            // Send a success message to the user for a successful addition of a new user into the database, whilst redirecting them back to the manage users page.
            setSuccess("New user, " . $name . " has been successfully added into the system!", "/manage-users");
            exit;
        }
    }
?>

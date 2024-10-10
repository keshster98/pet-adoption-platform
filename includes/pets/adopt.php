<?php
    // Connecting to the database
    $database = connectToDB();

    // Get the user-entered data from the form.
    $user_id = $_POST["user_id"];
    $pet_id = $_POST["pet_id"];

    // SQL Command.
    $sql = "INSERT INTO adoption (`user_id`, `pet_id`) VALUES (:user_id, :pet_id)";
    // Prepare the SQL query.
    $query = $database->prepare($sql);
    // Execute the SQL query.
    $query->execute([
        'user_id' => $user_id,
        'pet_id' => $pet_id,
    ]);

    setSuccess("Successfully sent an adoption application, our admins will be in touch with your shortly!", "/");
    exit;
?>
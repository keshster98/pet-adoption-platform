<?php
    // Connecting to the database
    $database = connectToDB();

    // Get the user entered data from the add new user page.
    $user_id = $_POST["user_id"];
    $pet_id = $_POST["pet_id"];
    $activity = $_POST["activity"];

    // Add user into the database.
    // SQL command.
    $sql = "INSERT INTO volunteering (`activity`,`user_id`,`pet_id`) VALUES (:activity, :user_id, :pet_id)";
    // Prepare the SQL query.
    $query = $database->prepare($sql);
    // Execute the SQL query.
    $query->execute([
        "activity" => $activity,
        "user_id" => $user_id,
        "pet_id" => $pet_id
    ]);

    // Send a success message to the user for a successful addition of a new user into the database, whilst redirecting them back to the manage users page.
    setSuccess("Volunteering activity from user with id " . $user_id . " with dog ID " . $pet_id . " has been sent for approval", "/dashboard");
    exit;
?>
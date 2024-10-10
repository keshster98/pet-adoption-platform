<?php
    // Connecting to the database.
    $database = connectToDB();

    // Get user data from the edit user form.
    $name = $_POST["name"];
    $role = $_POST["role"];
    $id = $_POST["id"];

    // Update user data
    // SQL Command
    $sql = "UPDATE users SET name = :name, role = :role WHERE id = :id";
    // Prepare SQl query.
    $query = $database->prepare( $sql );
    // Execute SQL query.
    $query->execute([
        'name' => $name,
        'role' => $role,
        'id' => $id
    ]);

    // Send a success message to the user for a successful user edit, whilst redirecting them back to the manage users page.
    setSuccess("The user details for " . $name . " has been successfully updated!", "/manage-users");
    exit;
?>
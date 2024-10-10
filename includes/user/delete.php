<?php
    // Connecting to the database.
    $database = connectToDB();

    // Get user data from the as the delete button in the modal is pressed.
    $id = $_POST["id"];
    $name = $_POST["name"];
    
    // Delete the user.
    // SQL Command.
    $sql = "DELETE FROM users where id = :id";
    // Prepare SQL query.
    $query = $database->prepare($sql);
    // Execute SQL query.
    $query->execute([
    'id' => $id
    ]);
 
    // Send a success message to the user for a successful user deletion, whilst redirecting them back to the manage users page.
    setSuccess("The user, " . $name . " has been successfully deleted!", "/manage-users");
    exit;
?>
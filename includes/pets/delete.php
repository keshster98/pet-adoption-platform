<?php
    // Connecting to the database.
    $database = connectToDB();

    // Get pet data from the as the delete button in the modal is pressed.
    $id = $_POST["id"];
    $name = $_POST["name"];
    
    // Delete the pet.
    // SQL Command.
    $sql = "DELETE FROM pets where id = :id";
    // Prepare SQL query.
    $query = $database->prepare($sql);
    // Execute SQL query.
    $query->execute([
    'id' => $id
    ]);
 
    // Send a success message to the user for a successful user deletion, whilst redirecting them back to the manage users page.
    setSuccess("The pet, " . $name . " has been successfully deleted!", "/manage-pets");
    exit;
?>
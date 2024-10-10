<?php
    // Connecting to the database.
    $database = connectToDB();

    // Get pet data from the edit pet form.
    $id = $_POST["id"];
    $name = $_POST["name"];
    $age = $_POST["age"];
    $breed = $_POST["breed"];

    // Update pet data
    // SQL Command
    $sql = "UPDATE pets SET name = :name, age = :age, breed = :breed WHERE id = :id";
    // Prepare SQl query.
    $query = $database->prepare( $sql );
    // Execute SQL query.
    $query->execute([
        "name" => $name,
        "age" => $age,
        "breed" => $breed,
        "id" => $id
    ]);

    // Send a success message to the admin for a successful pet edit, whilst redirecting them back to the manage users page.
    setSuccess("The pet details for " . $name . " has been successfully updated!", "/manage-pets");
    exit;
?>
<?php
    // Connecting to the database
    $database = connectToDB();

    // Get the user-entered data from the form.
    $name = $_POST["name"];
    $age = $_POST["age"];
    $breed = $_POST["breed"];

    // Set the target directory for the images.
    $target_dir = "assets/images/";
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if the file is a valid image type (jpeg, jpg, png)
    $allowed_file_types = ['jpeg', 'jpg', 'png'];
    if (!in_array($imageFileType, $allowed_file_types)) {
        setError("Sorry, only JPG, JPEG, and PNG files are allowed!", "/manage-pets-add");
        exit;
    }

    // Check for duplicate files (if file already exists in the folder)
    if (file_exists($target_file)) {
        setError("Sorry, the file already exists, use another file!", "/manage-pets-add");
        exit;
    }

    // Move the uploaded file to the target directory using the correct tmp_name.
    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
        // Successfully moved the uploaded file, now add pet data into the database.

        // SQL command to insert the pet data into the database, including the photo path.
        $sql = "INSERT INTO pets (`photo`, `name`, `age`, `breed`) VALUES (:photo, :name, :age, :breed)";
        // Prepare the SQL query.
        $query = $database->prepare($sql);
        // Execute the SQL query with the data from the form and the photo file path.
        $query->execute([
            "photo" => $target_file,
            "name" => $name,
            "age" => $age,
            "breed" => $breed
        ]);

        // Send a success message to the user for a successful addition of the new pet into the database.
        setSuccess("New pet, " . $name . " has been successfully added into the system!", "/manage-pets");
        exit;

    // Send an error message if there is an issue uploading the image.
    } else {
        setError("Sorry, there was an error uploading the image!", "/manage-pets-add" );
        exit;
    }
?>

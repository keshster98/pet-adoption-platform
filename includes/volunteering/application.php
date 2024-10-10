<?php
    // Connecting to the database.
    $database = connectToDB();

    // Get pet data from the submit volunteer form.
    $id = $_POST["id"];

    $sql = "INSERT INTO v_apply (`user_id`) VALUES (:id)";
    // Prepare the SQL query.
    $query = $database->prepare($sql);
    // Execute the SQL query.
    $query->execute([
        'id' => $id,
    ]);

    // Insert data into v_apply table and join it together with the users table.
    $sql = "SELECT u.name, u.email, u.phone_number, u.created_on
            FROM v_apply v
            INNER JOIN users u ON v.user_id = u.id
            WHERE v.user_id = :id";
    // Prepare SQL query.
    $query = $database->prepare($sql);
    // Execute SQL query.
    $query->execute([
        'id' => $id
    ]);
    // Fetch the details of the logged in user who applied to be a volunteer
    $volunteer = $query->fetch();

    setSuccess($volunteer["name"] . ", you have successfully applied to be a volunteer, stay tuned!", "/")
?>
                                m
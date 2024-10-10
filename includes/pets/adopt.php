<?php
    // Connecting to the database
    $database = connectToDB();

    // Get the user-entered data from the form.
    $user_id = $_POST["user_id"];

    var_dump($user_id);
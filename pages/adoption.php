<?php 
    checkIfuserIsNotLoggedIn("You must be logged in to view your the adoption list", "/login");

    // Connecting to the database
    $database = connectToDB();

    // Load the pet data
    // SQL command.
    $sql = "SELECT * FROM pets";
    // Prepare SQL query.
    $query = $database->prepare($sql);
    // Execute SQL query.
    $query->execute();
    // Fetch all results.
    $pets = $query->fetchAll();

    require "parts/header.php" 
?>

<div class="container mx-auto my-5" style="max-width: 800px;">
    <div class="d-flex justify-content-center align-items-center mb-2">
        <h1 class="h1 mb-4 text-center">Adoption Listings</h1>
    </div>
    <hr style="border-top: 3px solid black;">
    <form method="POST" action="/pets/adopt">
        <div class="row justify-content-center" style="gap: 1.5rem;">
            <?php foreach($pets as $index => $pet): ?>
            <div class="col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center">
                <div class="card" style="width: 18rem;">
                    <img src=<?= $pet["photo"] ?> class="card-img-top" style="height: 200px; object-fit: cover;">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <h5 class="card-title"><?= $pet["name"] ?></h5>
                        <p class="card-text"><?= $pet["age"] ?> years old</p>
                        <p class="card-text"><?= $pet["breed"] ?></p>
                        <input type="hidden" name="user_id" id="user_id" value="<?= $_SESSION["user"]["id"]; ?>">
                        <input type="hidden" name="user_name" id="user_name" value="<?= $_SESSION["user"]["name"]; ?>">
                        <input type="hidden" name="pet_id" id="pet_id" value="<?= $pet["id"]; ?>">
                        <button type="submit" class="btn btn-primary w-100">Adopt</button>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </form>
</div>

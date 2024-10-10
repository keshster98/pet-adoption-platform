<?php 
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
<div class="container mx-auto my-5" style="max-width: 700px;">
    <div class="d-flex justify-content-center align-items-center mb-2">
        <h1 class="h1">Apply for Volunteering Activities</h1>
    </div>
    <hr style="border-top: 3px solid black;">
    <div class="card mb-2 p-3 shadow-lg">
    <?php require "parts/error-message.php"?>
        <form method="POST" action="/volunteering/activities">
            <div class="mb-3">
                <label for="name" class="form-label"><strong>Name</strong></label>
                <input type="hidden" class="form-control" name="user_id" id="user_id" value="<?=$_SESSION["user"]["id"]?>" />
                <input type="text" class="form-control" name="name" id="name" value="<?=$_SESSION["user"]["name"]?>" />
            </div>
            <div class="mb-3">
                <label for="email" class="form-label"><strong>Email</strong></label>
                <input type="email" class="form-control" name="email" id="email" value="<?=$_SESSION["user"]["email"]?>"/>
            </div>
            <div class="mb-3">
                <label for="phone-number" class="form-label"><strong>Phone Number</strong></label>
                <input type="text" class="form-control" name="phone-number" id="phone-number" value="<?=$_SESSION["user"]["phone_number"]?>"/>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label"><strong>Activity</strong></label>
                <select class="form-control" name="activity" id="activity">
                    <option value="" disabled selected hidden>Select an option</option>
                    <option value="walk" >Walking dog</option>
                    <option value="bath" >Bathing dog</option>
                    <option value="clean" >Cleaning dog house</option>
                </select>
            </div>
            <div class="mb-3">
                
                <label for="role" class="form-label"><strong>Select Dog</strong></label>
                <select class="form-control" name="pet_id" id="pet_id">
                    <option value="" disabled selected hidden>Select an option</option>
                    <?php foreach ($pets as $index => $pet): ?>
                    <option value="<?=$pet["id"]?>"><?=$pet["name"]?></option>
                    <?php endforeach; ?>
                </select>
                
            </div>
            <div class="d-flex justify-content-center pt-3">
                <button type="submit" class="btn btn-sm btn-primary p-2" style="width: 48%;" id="add-user-button"><i class="bi bi-person-plus" style="margin-right: 5px;"></i> Add activity to list</button>
            </div>
        </form>
    </div>
</div>
<?php require "parts/footer.php" ?>

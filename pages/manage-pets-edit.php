<?php 
  checkIfuserIsNotLoggedIn("You must be logged in to manage users!", "/login");
  checkIfIsNotAdmin("You must be an admin to manage users!", "/dashboard");

  // Get the ID from the URL
  $id = $_GET['id'];

  // Connect to database
  $database = connectToDB();

  // Load existing pet data

  // SQL command
  $sql = "SELECT * FROM pets WHERE id = :id";
  // Prepare SQL query.
  $query = $database->prepare($sql);
  // Execute SQL query.
  $query->execute([
    'id' => $id
  ]);
  // Fetch the table row from the database containing the first matching result.
  $pet = $query->fetch();

  require "parts/header.php"; 
?>

<div class="container mx-auto my-5" style="max-width: 700px;">
    <div class="d-flex justify-content-center align-items-center mb-2">
        <h1 class="h1">Edit Pet</h1>
    </div>
    <hr style="border-top: 3px solid black;">
    <div class="card mb-2 p-3">
        <form method="POST" action="/pets/edit">
            <?php require "parts/error-message.php" ?>
            <div class="mb-3">
                <div class="row">
                    <div class="col">
                        <label for="name" class="form-label"><strong>Name</strong></label>
                        <input type="text" class="form-control" name="name" id="name" value=<?= $pet["name"]; ?>>
                        <input type="hidden" name="id" value="<?= $pet["id"]; ?>" />
                    </div>
                    <div class="col">
                        <label for="email" class="form-label"><strong>Age</strong></label>
                        <input type="number" min="1" class="form-control" name="age" id="age" value=<?= $pet["age"] ?>>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <label for="phone-number" class="form-label"><strong>Breed</strong></label>
                        <input type="text" class="form-control" name="breed" id="breed" value="<?= $pet["breed"]?>">
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between pt-3">
                <a href="/manage-pets" class="btn btn-dark btn-sm p-2" style="width: 48%;"><i class="bi bi-chevron-left"></i><i class="bi bi-person-gear" style="margin-right: 5px;"></i>Manage Pets</a>
                <button type="submit" class="btn btn-sm btn-success p-2" style="width: 48%;" id="edit-button" disabled><i class="bi bi-pencil" style="margin-right: 5px;"></i>Edit</button>
            </div>
        </form>
    </div>
</div>

<script>
  // Store the pre-filled user data from the edit user page.
  const name = document.getElementById("name");
  const age = document.getElementById("age");
  const breed = document.getElementById("breed");
  const editButton = document.getElementById("edit-button");

  // Store the original values of the user data for comparison later with the new data.
  const oldName = name.value.trim(); // .trim() removes whitespace before the first word and after the last word in the field.
  const oldAge = age.value.trim();
  const oldBreed = breed.value;

  // Attach event listeners to track any changes in the fields.
  name.addEventListener("input", checkForEditPetChanges);
  age.addEventListener("input", checkForEditPetChanges);
  breed.addEventListener("input", checkForEditPetChanges);

  // Function to check if there are changes to the pre-filled user data.
  function checkForEditPetChanges(){

    const newName = name.value.trim();
    const newAge = age.value.trim();
    const newBreed = breed.value;

    // Check if the the new data (if any) is different from the old data.

    // Disable the edit button if there are no changes.
    if (newName !== oldName || newAge !== oldAge || newBreed !== oldBreed){
        editButton.disabled = false;
    
    // Enable the edit button if there are changes.
    } else {
        editButton.disabled = true;
    }
  }
</script>

<?php require "parts/footer.php" ?>

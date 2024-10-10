<?php
  checkIfuserIsNotLoggedIn("You must be logged in to manage pets!", "/login");
  checkIfIsNotAdmin("You must be an admin to manage pets!", "/dashboard");
  
  require "parts/header.php" 
?>

<div class="container mx-auto my-5" style="max-width: 700px;">
    <div class="d-flex justify-content-center align-items-center mb-2">
        <h1 class="h1">Add New Pet</h1>
    </div>
    <hr style="border-top: 3px solid black;">
    <div class="card mb-2 p-3 shadow-lg">
    <?php require "parts/error-message.php"?>
        <form method="POST" action="/pets/add" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="photo" class="form-label"><strong>Photo</strong></label>
            </div>
            <div class="mb-3">
                <input type="file" name="photo" id="photo" accept="image/*" oninput="enableAddPetButton()" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label"><strong>Name</strong></label>
                <input type="text" class="form-control" name="name" id="name" oninput="enableAddPetButton()" placeholder="Enter pet's name"/>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label"><strong>Age</strong></label>
                <input type="number" min="1" class="form-control" name="age"  id="age" oninput="enableAddPetButton()" placeholder="Enter pet's age"/>
            </div>
            <div class="mb-3">
                <label for="phone-number" class="form-label"><strong>Breed</strong></label>
                <input type="text" class="form-control" name="breed" id="breed" oninput="enableAddPetButton()" placeholder="Enter pet's breed"/>
            </div>
            <div class="d-flex justify-content-between pt-3">
                <a href="/manage-pets" class="btn btn-dark btn-sm p-2" style="width: 48%;"><i class="bi bi-chevron-left"></i><i class="bi bi-person-gear" style="margin-right: 5px;"></i>Manage Pets</a>
                <button type="submit" class="btn btn-sm btn-primary p-2" style="width: 48%;" id="add-pet-button" disabled><i class="bi bi-person-plus" style="margin-right: 5px;"></i> Add Pet</button>
            </div>
        </form>
    </div>
</div>

<script>
  // Function to enable the add new user button.
  function enableAddPetButton() {

      // Store the inputs from the add new user page.
      const photo = document.getElementById("photo").value;
      const name = document.getElementById("name").value;
      const age = document.getElementById("age").value;
      const breed = document.getElementById("breed").value;
      const addPetButton = document.getElementById("add-pet-button");
      
      // Check if all fields are filled.
      // Enable the add new user button if all fields are filled.
      if (photo && name && age && breed) {
          addPetButton.disabled = false;

      // Disable the add new user button if all fields are not filled.
      } else {
          addPetButton.disabled = true;
      }
  }
</script>

<?php require "parts/footer.php" ?>


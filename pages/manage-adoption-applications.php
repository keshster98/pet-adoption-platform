<?php
  checkIfuserIsNotLoggedIn("You must be logged in to manage users!", "/login");
  checkIfIsNotAdmin("You must be an admin to manage users!", "/dashboard");

  
  require "parts/header.php" 
?>

<div class="container mx-auto my-5" style="max-width: 800px; height: 70vh;">
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h1 class="h1">Adoption Applications</h1>
        <a href="/manage-users-add" class="btn btn-primary btn-sm shadow-lg p-2"><i class="bi bi-person-plus" style="margin-right: 5px;"></i> Add New User</a>
    </div>
    <hr style="border-top: 3px solid black;">
    <div class="card mb-2 p-3 shadow-lg">
        <?php require "parts/success-message.php" ?>
                
<?php require "parts/footer.php" ?>
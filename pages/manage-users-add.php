<?php
  checkIfuserIsNotLoggedIn("You must be logged in to manage users!", "/login");
  checkIfIsNotAdmin("You must be an admin to manage users!", "/dashboard");
  
  require "parts/header.php" 
?>

<div class="container mx-auto my-5" style="max-width: 700px;">
    <div class="d-flex justify-content-center align-items-center mb-2">
        <h1 class="h1">Add New User</h1>
    </div>
    <hr style="border-top: 3px solid black;">
    <div class="card mb-2 p-3 shadow-lg">
    <?php require "parts/error-message.php"?>
        <form method="POST" action="/user/add">
            <div class="mb-3">
                <label for="name" class="form-label"><strong>Name</strong></label>
                <input type="text" class="form-control" name="name" id="name" oninput="enableAddUserButton()" placeholder="Enter user's name"/>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label"><strong>Email</strong></label>
                <input type="email" class="form-control" name="email" id="email" oninput="enableAddUserButton()" placeholder="Enter user's email (example@domain.com)"/>
            </div>
            <div class="mb-3">
                <label for="phone-number" class="form-label"><strong>Phone Number</strong></label>
                <input type="text" class="form-control" name="phone-number" id="phone-number" oninput="enableAddUserButton()" placeholder="Enter user's phone number"/>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label"><strong>Password</strong></label>
                <input type="password" class="form-control" name="password" id="password" oninput="enableAddUserButton()" placeholder="Enter user's password"/>
            </div>
            <div class="mb-3">
                <label for="confirm-password" class="form-label"><strong>Confirm Password</strong></label>
                <input type="password" class="form-control" name="confirm-password" id="confirm-password" oninput="enableAddUserButton()"placeholder="Re-enter user's password"/>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label"><strong>Role</strong></label>
                <select class="form-control" name="role" id="role" oninput="enableAddUserButton()">
                    <option value="" disabled selected hidden>Select an option</option>
                    <option value="user">User</option>
                    <option value="volunteer">Volunteer</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <div class="d-flex justify-content-between pt-3">
                <a href="/manage-users" class="btn btn-dark btn-sm p-2" style="width: 48%;"><i class="bi bi-chevron-left"></i><i class="bi bi-person-gear" style="margin-right: 5px;"></i>Manage Users</a>
                <button type="submit" class="btn btn-sm btn-primary p-2" style="width: 48%;" id="add-user-button" disabled><i class="bi bi-person-plus" style="margin-right: 5px;"></i> Add User</button>
            </div>
        </form>
    </div>
</div>

<script>
  // Function to enable the add new user button.
  function enableAddUserButton() {

      // Store the inputs from the add new user page.
      const name = document.getElementById("name").value;
      const email = document.getElementById("email").value;
      const phoneNumber = document.getElementById("phone-number").value;
      const password = document.getElementById("password").value;
      const confirmPassword = document.getElementById("confirm-password").value;
      const role = document.getElementById("role").value;
      const addUserButton = document.getElementById("add-user-button");
      
      // Check if all fields are filled.

      // Enable the add new user button if all fields are filled.
      if (name && email && phoneNumber && password && confirmPassword && role) {
          addUserButton.disabled = false;

      // Disable the add new user button if all fields are not filled.
      } else {
          addUserButton.disabled = true;
      }
  }
</script>

<?php require "parts/footer.php" ?>


<?php
  checkIfuserIsNotLoggedIn("You must be logged in to manage users!", "/login");
  checkIfIsNotAdmin("You must be an admin to manage users!", "/dashboard");

  // Get id and name from the URL.
  $id = $_GET["id"];
  $name = $_GET["name"];
  
  require "parts/header.php" 
?>

<div class="container mx-auto my-5" style="max-width: 700px;">
    <div class="d-flex justify-content-center align-items-center mb-2">
        <h1 class="h1">Change Password</h1>
    </div>
    <hr style="border-top: 3px solid black;">
    <div class="card mb-2 p-3 shadow-lg">
        <form method="POST" action="/user/change-password">
            <?php require "parts/error-message.php" ?>
            <div class="mb-3">
                <div class="row">
                    <div class="col">
                        <input type="hidden" name="name" value="<?= $name; ?>" />
                        <input type="hidden" name="id" value="<?= $id; ?>" />
                        <label for="password" class="form-label"><strong>Password</strong></label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter user password" oninput="enableConfirmNewPasswordButton()"/>
                    </div>
                    <div class="col">
                        <label for="confirm-password" class="form-label"><strong>Confirm Password</strong></label>
                        <input type="password" class="form-control" name="confirm-password" id="confirm-password" placeholder="Re-enter user password" oninput="enableConfirmNewPasswordButton()"/>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between pt-3">
                <a href="/manage-users" class="btn btn-dark btn-sm p-2" style="width: 48%;"><i class="bi bi-chevron-left"></i><i class="bi bi-person-gear" style="margin-right: 5px;"></i>Manage Users</a>
                <button type="submit" class="btn btn-sm btn-warning p-2" style="width: 48%;" id="confirm-button" disabled><i class="bi bi-key" style="margin-right: 5px;"></i>Confirm New Password</button>
            </div>
        </form>
    </div>
</div>

<script>
  // Function to enable the confirm new password button.
  function enableConfirmNewPasswordButton() {

      // Store the inputs from the change password page.
      const password = document.getElementById("password").value;
      const confirmPassword = document.getElementById("confirm-password").value;
      const confirmButton = document.getElementById("confirm-button");
      
      // Check if both the fields are filled.

      // Enable the confirm new password button if both fields are filled.
      if (password && confirmPassword) {
          confirmButton.disabled = false;

      // Disable the confirm new password button if both fields are not filled.
      } else {
          confirmButton.disabled = true;
      }
  }
</script>

<?php require "parts/footer.php" ?>

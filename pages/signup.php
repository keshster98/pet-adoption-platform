<?php require "parts/header.php" ?>

<div class="container my-5 mx-auto" style="max-width: 500px;">
    <h1 class="h1 mb-4 text-center">Sign Up</h1>
    <hr style="border-top: 3px solid black;">
    <div class="card p-3 shadow-lg">
        <?php require "parts/error-message.php" ?>
        <form method="POST" action="/auth/signup">
            <div class="mb-3">
                <label for="name" class="form-label"><strong>Name</strong></label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name" oninput="enableSignUpButton()" />
            </div>
            <div class="mb-3">
                <label for="email" class="form-label"><strong>Email address</strong></label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email (example@domain.com)" oninput="enableSignUpButton()" />
            </div>
            <div class="mb-3">
                <label for="phone-number" class="form-label"><strong>Phone Number</strong></label>
                <input type="text" class="form-control" name="phone-number" id="phone-number" placeholder="Enter your phone number" oninput="enableSignUpButton()"/>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label"><strong>Password</strong></label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" oninput="enableSignUpButton()"/>
            </div>
            <div class="mb-3">
                <label for="confirm_password" class="form-label"><strong>Confirm Password</strong></label>
                <input type="password" class="form-control" name="confirm-password" id="confirm-password" placeholder="Re-enter your password" oninput="enableSignUpButton()"/>
            </div>
            <div class="pt-3">
                <button type="submit" class="btn btn-primary btn-sm p-2" style="width: 100%;" id="sign-up-button" disabled><i class="bi bi-person-plus" style="margin-right: 5px;"></i> Sign Up</button>
            </div>
            <div class="d-flex justify-content-between pt-3">
                <a href="/" class="btn btn-dark btn-sm d-flex align-items-center justify-content-center" style="width: 48%;"><i class="bi bi-house" style="margin-right: 5px;"></i> Home</a>
                <a href="/login" class="btn btn-warning btn-sm d-flex align-items-center justify-content-center" style="width: 48%;">Already have an account?<br>Login Here</a>
            </div>
        </form>
    </div>
</div>

<script>
  // Function to enable the sign up button.
  function enableSignUpButton() { 

      // Store the inputs from the sign up page.
      const name = document.getElementById("name").value;
      const email = document.getElementById("email").value;
      const phoneNumber = document.getElementById("phone-number").value;
      const password = document.getElementById("password").value;
      const confirmPassword = document.getElementById("confirm-password").value;
      const signUpButton = document.getElementById("sign-up-button");
      
      // Check if all the fields are filled.

      // Enable the sign up button if all the fields are filled.
      if (name && email && phoneNumber && password && confirmPassword) {
        signUpButton.disabled = false;

      // Disable the sign up button if all the fields are not filled.
      } else {
        signUpButton.disabled = true;
      }
  }
</script>

<?php require "parts/footer.php" ?>

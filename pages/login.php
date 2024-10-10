<?php require "parts/header.php" ?>

<div class="container my-5 mx-auto" style="max-width: 500px;">
    <h1 class="h1 mb-4 text-center">Login</h1>
    <hr style="border-top: 3px solid black;">
    <div class="card p-3 shadow-lg">
        <?php require "parts/success-message.php" ?>
        <?php require "parts/error-message.php" ?>
        <form method="POST" action="/auth/login">
            <div class="mb-3">
                <label for="email" class="form-label"><strong>Email Address</strong></label>
                <input type="email" class="form-control" name="email" id="email" oninput="enableLoginButton()" placeholder="Enter your email (example@domain.com)" />
            </div>
            <div class="mb-3">
                <label for="password" class="form-label"><strong>Password</strong></label>
                <input type="password" class="form-control" name="password" id="password" oninput="enableLoginButton()" placeholder="Enter your password"/>
            </div>
            <div class="pt-3">
                <button type="submit" class="btn btn-primary btn-sm p-2" style="width: 100%;" id="login-button" disabled><i class="bi bi-box-arrow-in-right" style="margin-right: 5px;"></i> Log In</button>
            </div>
            <div class="d-flex justify-content-between pt-3">
                <a href="/" class="btn btn-dark btn-sm d-flex align-items-center justify-content-center" style="width: 48%"><i class="bi bi-house" style="margin-right: 5px;"></i> Home</a>
                <a href="/signup" class="btn btn-warning btn-sm d-flex align-items-center justify-content-center" style="width: 48%;">New user?<br>Sign up here!</a>
            </div>
        </form>
    </div>
</div>

<script>
  // Function to enable the login button.
  function enableLoginButton(){ 

    // Store the inputs from the login page.
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;
    const loginButton = document.getElementById("login-button");
    
    // Check if all the fields are filled.

    // Enable the login button if all the fields are filled.
    if (email && password) {
      loginButton.disabled = false;

    // Disable the login button if all the fields are not filled.
    } else {
      loginButton.disabled = true;
    }
  }
</script>

<?php require "parts/footer.php" ?>
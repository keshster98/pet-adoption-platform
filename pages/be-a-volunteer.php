<?php
    checkIfuserIsNotLoggedIn("You must be logged in to apply to be a volunteer!", "/login");

    // Connecting to the database.
    $database = connectToDB();

    // Get user ID from URL.
    $id = $_GET["id"];

    // Load the user data
    // SQL command.
    $sql = "SELECT * FROM users WHERE id = :id";
    // Prepare SQL query.
    $query = $database->prepare($sql);
    // Execute SQL query.
    $query->execute([
        'id' => $id
    ]);
    // Fetch all results.
    $user = $query->fetch();
  
    require "parts/header.php" 
?>

<div class="container mx-auto my-5" style="max-width: 700px;">
    <div class="d-flex justify-content-center align-items-center mb-2">
        <h1 class="h1">Be A Volunteer</h1>
    </div>
    <hr style="border-top: 3px solid black;">
    <div class="card mb-2 p-3">
        <form method="POST" action="/volunteering/application">
            <?php require "parts/error-message.php" ?>
            <div class="mb-3">
                <div class="row">
                    <div class="col">
                        <label for="name" class="form-label"><strong>Name</strong></label>
                        <input type="text" class="form-control" name="name" id="name" value=<?= $user["name"]; ?> disabled />
                        <input type="hidden" name="id" id="id" value="<?= $user["id"]; ?>" />
                    </div>
                    <div class="col">
                        <label for="email" class="form-label"><strong>Email</strong></label>
                        <input type="email" class="form-control" name="email" id="email" value=<?= $user["email"] ?> disabled />
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <label for="phone-number" class="form-label"><strong>Phone Number</strong></label>
                        <input type="text" class="form-control" name="phone-number" id="phone-number" value=<?= $user["phone_number"]?> disabled>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col text-center">
                        <input type="checkbox" id="terms" name="terms" required>
                        <label for="terms">I confirm that the details provided above are correct and I want to become a volunteer</label>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center pt-3">
                <input type="hidden" name="id" id="id" value="<?= $user["id"]; ?>">
                <button type="submit" class="btn btn-sm btn-success p-2" style="width: 48%;" name="submit-button" id="submit-button" disabled><i class="bi bi-send" style="margin-right: 5px;"></i>Submit Volunteer Application</button>
            </div>
        </form>
    </div>
</div>

<script>

    // Store the checkmark and button id.
    const termsCheckbox = document.getElementById('terms');
    const submitButton = document.getElementById('submit-button');

    // Add an event listener to the checkbox
    termsCheckbox.addEventListener('change', function() {
        // Enable the submit button if the checkbox is checked.
        if (this.checked) {
            submitButton.disabled = false;

        // Disable the submit button if the checkbox is not checked.
        } else {
            submitButton.disabled = true;
        }
    });

</script>

<?php require "parts/footer.php" ?>
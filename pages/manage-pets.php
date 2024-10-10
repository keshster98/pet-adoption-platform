<?php
  checkIfuserIsNotLoggedIn("You must be logged in to manage pets!", "/login");
  checkIfIsNotAdmin("You must be an admin to manage pets!", "/dashboard");

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
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h1 class="h1">Manage Pets</h1>
        <a href="/manage-pets-add" class="btn btn-primary btn-sm shadow-lg p-2"><i class="bi bi-person-plus" style="margin-right: 5px;"></i> Add New Pet</a>
    </div>
    <hr style="border-top: 3px solid black;">
    <div class="card mb-2 p-3 shadow-lg">
        <?php require "parts/success-message.php" ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Age</th>
                    <th scope="col">Breed</th>
                    <th scope="col" class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($pets as $index => $pet): ?>
                    <tr>
                        <th scope="row"><?=$pet["id"]?></th>
                        <td><?=$pet["name"]?></td>
                        <td><?=$pet["age"]?></td>
                        <td><?=$pet["breed"]?></td>
                        <td class="text-end">
                            <div class="buttons">
                                <a href="/manage-pets-edit?id=<?= $pet["id"]; ?>&name=<?= $pet["name"]; ?>" class="btn btn-success btn-sm me-2"><i class="bi bi-pencil"></i></a>

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete-pet-<?= $pet["id"]; ?>">
                                    <i class="bi bi-trash3"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="delete-pet-<?= $pet["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete "<?= $pet["name"]; ?>"?</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-start">
                                                Are you sure? This action cannot be reversed!
                                            </div>
                                            <div class="modal-footer">
                                                <form method="POST" action="/pets/delete" style="display: inline-block;">
                                                    <input type="hidden" name="id" value="<?= $pet["id"]; ?>" />
                                                    <input type="hidden" name="name" value="<?= $pet["name"]; ?>" />
                                                    <button class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require "parts/footer.php" ?>

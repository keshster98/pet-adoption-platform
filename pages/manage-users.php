<?php
  checkIfuserIsNotLoggedIn("You must be logged in to manage users!", "/login");
  checkIfIsNotAdmin("You must be an admin to manage users!", "/dashboard");

  // Connecting to the database
  $database = connectToDB();

  // Load the user data
  // SQL command.
  $sql = "SELECT * FROM users";
  // Prepare SQL query.
  $query = $database->prepare($sql);
  // Execute SQL query.
  $query->execute();
  // Fetch all results.
  $users = $query->fetchAll();
  
  require "parts/header.php" 
?>

<div class="container mx-auto my-5" style="max-width: 800px;">
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h1 class="h1">Manage Users</h1>
        <a href="/manage-users-add" class="btn btn-primary btn-sm shadow-lg p-2"><i class="bi bi-person-plus" style="margin-right: 5px;"></i> Add New User</a>
    </div>
    <hr style="border-top: 3px solid black;">
    <div class="card mb-2 p-3 shadow-lg">
        <?php require "parts/success-message.php" ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Role</th>
                    <th scope="col" class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $index => $user): ?>
                    <tr>
                        <th scope="row"><?=$user["id"]?></th>
                        <td><?=$user["name"]?></td>
                        <td><?=$user["email"]?></td>
                        <td><?=$user["phone_number"]?></td>
                        <?php if($user["role"] === "admin"): ?>
                            <td><span class="badge rounded-pill bg-danger">Admin</span></td>
                        <?php elseif($user["role"] === "volunteer"): ?>
                            <td><span class="badge rounded-pill bg-warning">Volunteer</span></td>
                        <?php else: ?>
                            <td><span class="badge rounded-pill bg-success">User</span></td>
                        <?php endif; ?>
                        <td class="text-end">
                            <div class="buttons">
                                <a href="/manage-users-edit?id=<?= $user["id"]; ?>&name=<?= $user["name"]; ?>" class="btn btn-success btn-sm me-2"><i class="bi bi-pencil"></i></a>
                                <a href="/manage-users-change-password?id=<?= $user["id"]; ?>&name=<?= $user["name"]; ?>" class="btn btn-warning btn-sm me-2"><i class="bi bi-key"></i></a>
                                <?php if($user["role"] !== "admin"): ?>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete-user-<?= $user["id"]; ?>">
                                    <i class="bi bi-trash3"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="delete-user-<?= $user["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete "<?= $user["name"]; ?>"?</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-start">
                                                Are you sure? This action cannot be reversed!
                                            </div>
                                            <div class="modal-footer">
                                                <form method="POST" action="/user/delete" style="display: inline-block;">
                                                    <input type="hidden" name="id" value="<?= $user["id"]; ?>" />
                                                    <input type="hidden" name="name" value="<?= $user["name"]; ?>" />
                                                    <button class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require "parts/footer.php" ?>

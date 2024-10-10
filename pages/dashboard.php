<?php 
    checkIfuserIsNotLoggedIn("You must be logged in to view your dashboard", "/login");

    
    require "parts/header.php" 
?>

<div class="container mx-auto my-5" style="max-width: 800px;">
    <div class="d-flex justify-content-center align-items-center mb-2">
        <h1 class="h1 mb-4 text-center"><?= $_SESSION['user']['name'] . "'s Dashboard" ?></h1>
    </div>
    <?php require "parts/success-message.php" ?>
    <?php require "parts/error-message.php" ?>
    <hr style="border-top: 3px solid black;">
    <div class="row justify-content-center align-items-center">
        <?php if ($_SESSION["user"]["role"] === "admin"): ?>
            <div class="row">
                <div class="col">
                    <div class="card mb-2 shadow-lg">
                        <div class="card-body">
                            <h5 class="card-title text-center">
                            <div class="mb-1">
                            <span style="font-size: 3rem;">👨‍👩‍👧‍👦</span>
                            </div>
                            Manage Users
                            </h5>
                            <div class="text-center mt-3">
                                <a href="/manage-users" class="btn btn-primary btn-sm">Access</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-2 shadow-lg">
                        <div class="card-body">
                            <h5 class="card-title text-center">
                            <div class="mb-1">
                                <span style="font-size: 3rem;">🐶</span>
                            </div>
                            Manage Pets
                            </h5>
                            <div class="text-center mt-3">
                                <a href="/manage-pets" class="btn btn-primary btn-sm">Access</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card mb-2 shadow-lg">
                        <div class="card-body">
                            <h5 class="card-title text-center">
                            <div class="mb-1">
                                <span style="font-size: 3rem;">📝</span>
                            </div>
                            Manage Adoption Applications
                            </h5>
                            <div class="text-center mt-3">
                                <a href="manage-adoption-applications" class="btn btn-primary btn-sm">Access</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-2 shadow-lg">
                        <div class="card-body">
                            <h5 class="card-title text-center">
                            <div class="mb-1">
                                <span style="font-size: 3rem;">📝</span>
                            </div>
                            Manage Volunteer Applications
                            </h5>
                            <div class="text-center mt-3">
                                <a href="#" class="btn btn-primary btn-sm">Access</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-2 shadow-lg">
                        <div class="card-body">
                            <h5 class="card-title text-center">
                            <div class="mb-1">
                                <span style="font-size: 3rem;">📝</span>
                            </div>
                            Manage Volunteer Activity Applications
                            </h5>
                            <div class="text-center mt-3">
                                <a href="/manage-posts" class="btn btn-primary btn-sm">Access</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php elseif ($_SESSION["user"]["role"] === "volunteer"): ?>
            <div class="col">
                <div class="card mb-2 shadow-lg">
                    <div class="card-body">
                        <h5 class="card-title text-center">
                        <div class="mb-1">
                            <span style="font-size: 3rem;">📝</span>
                        </div>
                        Apply For Volunteering Activities
                        </h5>
                        <div class="text-center mt-3">
                            <a href="/volunteering?id=<?= $_SESSION['user']['id']?>" class="btn btn-primary btn-sm">Access</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card mb-2 shadow-lg">
                    <div class="card-body">
                        <h5 class="card-title text-center">
                        <div class="mb-1">
                            <span style="font-size: 3rem;">📝</span>
                        </div>
                        Volunteering Application Status
                        </h5>
                        <div class="text-center mt-3">
                            <a href="/manage-posts" class="btn btn-primary btn-sm">Access</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php elseif ($_SESSION["user"]["role"] === "user"): ?>
            <div class="col">
                <div class="card mb-2 shadow-lg">
                    <div class="card-body">
                        <h5 class="card-title text-center">
                        <div class="mb-1">
                            <span style="font-size: 3rem;">📝</span>
                        </div>
                        Adoption Application Status
                        </h5>
                        <div class="text-center mt-3">
                            <a href="/manage-posts" class="btn btn-primary btn-sm">Access</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php require "parts/footer.php" ?>

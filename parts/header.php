<!DOCTYPE html>
<html>
    <head>
        <title>Pet Adoption Platform</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="assets/css/style.css" />
    </head>
    <body>
        <header id="header">
            <nav class="container navbar navbar-expand-lg nav-custom">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Pet Adoption</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav ms-auto">
                            <?php if(isset($_SESSION["user"]) && ($_SESSION["user"]["role"] === "admin")): ?>
                                <a class="nav-link" href="/adoption">Adoption Listings</a>
                                <a class="nav-link" href="/dashboard">Dashboard</a>
                                <a class="nav-link" href="/logout">Logout</a>
                            <?php elseif (isset($_SESSION["user"]) && ($_SESSION["user"]["role"] === "volunteer")): ?>
                                <a class="nav-link" href="/volunteering">Volunteering</a>
                                <a class="nav-link" href="/dashboard">Dashboard</a>
                                <a class="nav-link" href="contact-us">Contact Us</a>
                                <a class="nav-link" href="/logout">Logout</a>
                            <?php elseif (isset($_SESSION["user"]) && ($_SESSION["user"]["role"] === "user")): ?>
                                <a class="nav-link" href="/adoption">Adoption Listings</a>
                                <a class="nav-link" href="/be-a-volunteer?id=<?= $_SESSION['user']['id'] ?>&name=<?= $_SESSION['user']['name'] ?>">Be A Volunteer</a>
                                <a class="nav-link" href="/dashboard">Dashboard</a>
                                <a class="nav-link" href="/contact-us">Contact Us</a>
                                <a class="nav-link" href="/logout">Logout</a>
                            <?php else: ?>
                                <a class="nav-link" href="/">Home</a>
                                <a class="nav-link" href="/login">Login</a>
                                <a class="nav-link" href="/signup">Sign Up</a>
                                <a class="nav-link" href="/contact-us">Contact Us</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
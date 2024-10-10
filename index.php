<?php
    // Start session.
    session_start();

    // Require the functions.php page.
    require "includes/functions.php";

    // Getting the current path the user is on.
    $path = $_SERVER["REQUEST_URI"];

    // Removes query strings at the end of URLs.
    $path = parse_url($path, PHP_URL_PATH);

    // Routing
    switch($path){
        // Actions
        case "/auth/login":
            require "includes/auth/login.php";
            break;
        case "/auth/signup":
            require "includes/auth/signup.php";
            break;
        case "/pets/add":
            require "includes/pets/add.php";
            break;
        case "/pets/adopt":
            require "includes/pets/adopt.php";
            break;
        case "/pets/delete":
            require "includes/pets/delete.php";
            break;
        case "/pets/edit":
            require "includes/pets/edit.php";
            break;
        case "/user/add":
            require "includes/user/add.php";
            break;
        case "/user/change-password":
            require "includes/user/change-password.php";
            break;
        case "/user/delete":
            require "includes/user/delete.php";
            break;
        case "/user/edit":
            require "includes/user/edit.php";
            break;
        case "/volunteering/application":
            require "includes/volunteering/application.php";
            break;
        // Pages
        case "/adoption":
            require "pages/adoption.php";
            break;
        case "/be-a-volunteer":
            require "pages/be-a-volunteer.php";
            break;
        case "/contact-us":
            require "pages/contact-us.php";
            break;
        case "/dashboard":
            require "pages/dashboard.php";
            break;
        case "/login":
            require "pages/login.php";
            break;
        case "/logout":
            require "pages/logout.php";
            break;
        case "/manage-adoption-applications":
            require "pages/manage-adoption-applications.php";
            break;
        case "/manage-pets-add":
            require "pages/manage-pets-add.php";
            break;
        case "/manage-pets-edit":
            require "pages/manage-pets-edit.php";
            break;
        case "/manage-pets":
            require "pages/manage-pets.php";
            break;
        case "/manage-users-add":
            require "pages/manage-users-add.php";
            break;
        case "/manage-users-change-password":
            require "pages/manage-users-change-password.php";
            break;
        case "/manage-users-edit":
            require "pages/manage-users-edit.php";
            break;
        case "/manage-users":
            require "pages/manage-users.php";
            break;
        case "/signup":
            require "pages/signup.php";
            break;
        case "/volunteering":
            require "pages/volunteering.php";
            break;
        case "/volunteering/activities":
            require "includes/volunteering/activities.php";
            break;
        // Default
        default:
            require "pages/home.php";
            break;
    }

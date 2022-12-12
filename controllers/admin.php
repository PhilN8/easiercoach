<?php

session_start();


// include_once "../autoload.php";
// dd($_SERVER['REQUEST_URI']);

if (isset($_SESSION['user_id']) && $_SESSION['role'] == 1) {
    include_once 'backend/users.php';
    include_once 'backend/data.php';
    include_once 'backend/tickets.php';
    include_once 'backend/routes.php';

    require 'views/admin.view.php';
    // require '../views/admin.view.php';
} else {
    require 'backend/logout.php';
}

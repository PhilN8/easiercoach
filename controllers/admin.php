<?php

session_start();

use Classes\User;
use Classes\Route;
use Classes\Ticket;
use Classes\Purchase;

$earnings = (new Route)->earningsPerRoute();
$total_admins = (new User)->getAdminCount();
$total_routes = (new Route)->getNumOfRoutes();
$total_tickets = (new Ticket)->getNumOfTickets();
$total_earnings = (new Purchase)->getTotalEarnings();

$users = User::all();
$user_ids = array_column($users, 'user_id');
$routes = Route::all();

$tickets = (new Purchase)->getPurchases();


if (isset($_SESSION['user_id']) && $_SESSION['role'] == 1) {
    require 'views/admin.view.php';
} else {
    abort(403);
}

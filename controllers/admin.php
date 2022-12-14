<?php

session_start();

use Classes\User;
use Classes\Route;
use Classes\Ticket;
use Classes\Purchase;
use Config\Response;

$users = User::all();
$routes = Route::all();
$purchases = (new Purchase)->getPurchases();
$total_admins = (new User)->getAdminCount();
$total_routes = (new Route)->getNumOfRoutes();
$total_tickets = (new Ticket)->getNumOfTickets();
$route_earnings = (new Route)->earningsPerRoute();
$total_earnings = (new Purchase)->getTotalEarnings();


if (isset($_SESSION['user_id']) && $_SESSION['role'] == 1) {
    require 'views/admin.view.php';
} else {
    abort(Response::FORBIDDEN);
}

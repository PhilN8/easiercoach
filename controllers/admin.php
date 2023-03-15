<?php
session_start();

use Classes\User;
use Classes\Route;
use Classes\Ticket;
use Config\Response;
use Classes\Purchase;

$users = User::all();
$routes = Route::all();
$purchases = (new Purchase)->getPurchases();
$total_admins = (new User)->getAdminCount();
$total_routes = (new Route)->getNumOfRoutes();
$total_tickets = (new Ticket)->getNumOfTickets();
$route_earnings = (new Route)->earningsPerRoute();
$total_earnings = (new Purchase)->getTotalEarnings();


if (isset($_SESSION['user_id']) && $_SESSION['role'] == 1) {
    view('admin.view.php', [
        'users' => $users,
        'routes' => $routes,
        'purchases' => $purchases,
        'total_admins' => $total_admins,
        'total_routes' => $total_routes,
        'total_tickets' => $total_tickets,
        'route_earnings' => $route_earnings,
        'total_earnings' => $total_earnings,
    ]);
} else {
    abort(Response::FORBIDDEN);
}

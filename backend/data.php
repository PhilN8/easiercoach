<?php

use Classes\Route;
use Classes\Ticket;
use Classes\Purchase;

$total_admins_sql = "SELECT COUNT(*) as `total` FROM `tbl_users` WHERE `is_deleted` = 0";
$total_admins = $conn->query($total_admins_sql)->fetch_assoc()['total'];

$total_tickets = (new Ticket)->getNumOfTickets();
$total_earnings = (new Purchase)->getSumOfPurchases();

$total_routes = (new Route)->getNumOfRoutes();
$earnings = (new Route)->earningsPerRoute();

<?php

// include "autoload.php";

use Classes\Route;
use Classes\Ticket;
use Classes\Purchase;

if (isset($_POST['book-ticket'])) {
    include_once "autoload.php";
    $purchase = (new Purchase())->newPurchase($_POST);
    $id = (new Ticket)->bookSeats($purchase, $_POST['seats']);

    // ob_clean();
    header("location:/redirect?id={$id}");
    exit();
}

view('booking.view.php', [
    'title' => "Booking | EasyCoach Ke",
    'routes' => Route::all()
]);

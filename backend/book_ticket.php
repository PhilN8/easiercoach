<?php

require "../autoload.php";

use Classes\Ticket;
use Config\Response;
use Classes\Purchase;

if (isset($_POST['book-ticket'])) {
    $purchase = (new Purchase())->newPurchase($_POST);
    $id = (new Ticket)->bookSeats($purchase, $_POST['seats']);
    echo json_encode(['message' => 1, 'id' => $id]);
    exit();
}

abort(Response::FORBIDDEN);

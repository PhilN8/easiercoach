<?php

require "../autoload.php";

use Classes\Ticket;
use Config\Response;
use Classes\Purchase;

if (isset($_POST['book-ticket'])) {
    $purchase = (new Purchase())->newPurchase($_POST);
    $id = (new Ticket)->bookSeats($purchase, $_POST['seats']);
    // ob_clean();
    // http_response_code(Response::OK);
    // header("location:/redirect?id={$id}");
    echo json_encode(['message' => 1, 'id' => $id]);
    exit();
}

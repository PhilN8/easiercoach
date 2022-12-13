<?php
require_once "db_conn.php";
require_once "../autoload.php";

use Classes\Ticket;
use Classes\Purchase;

$purchase = new Purchase();
$ticket = new Ticket();

if (isset($_POST['ticket_info'])) {
    $purchase_id = $_POST['ticket_info'];

    $seat_result = $ticket->getSeatNumbers($purchase_id);
    $result = $purchase->getPurchaseInfo($purchase_id);

    echo json_encode([$result, $seat_result]);
}

if (isset($_POST['purchase_id'])) {
    $purchase_id = $_POST['purchase_id'];

    $seat_result = $ticket->getSeatNumbers($purchase_id);
    $result = $purchase->getPurchaseInfo($purchase_id);

    echo json_encode([$result, $seat_result]);
}

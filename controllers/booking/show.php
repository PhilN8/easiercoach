<?php

use Classes\Ticket;
use Classes\Purchase;

if(!$_POST['purchase_id'] ?? false) exit();

$purchase = new Purchase();
$ticket = new Ticket();

// if (isset($_POST['purchase_id'])) {
$purchase_id = $_POST['purchase_id'];

$seat_result = $ticket->getSeatNumbers($purchase_id);
$result = $purchase->getPurchaseInfo($purchase_id);

echo json_encode([$result, $seat_result]);
// }
exit();
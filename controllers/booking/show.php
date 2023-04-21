<?php

use Classes\Ticket;
use Classes\Purchase;

if (!$_POST['purchase_id'] ?? false) exit();

$purchase = new Purchase();
$ticket = new Ticket();

$purchase_id = $_POST['purchase_id'];

echo json_encode([
    $purchase->getPurchaseInfo($purchase_id),
    $ticket->getSeatNumbers($purchase_id)
]);

exit();

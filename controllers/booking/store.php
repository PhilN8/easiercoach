<?php

use Classes\Ticket;
use Classes\Purchase;

// if (isset($_POST['book-ticket'])) {
// include_once "autoload.php";


// dd($seats);
// dd($_POST);

$seats = explode(",", $_POST['seats'][0]);
$purchase = (new Purchase())->newPurchase($_POST);
$id = (new Ticket)->bookSeats($purchase, $seats);
header("location:/redirect?id={$id}");
exit();

// ob_clean();
// }

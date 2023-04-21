<?php

use Classes\Ticket;
use Classes\Purchase;

$seats = explode(",", $_POST['seats'][0]);
$purchase = (new Purchase())->newPurchase($_POST);
$id = (new Ticket)->bookSeats($purchase, $seats);

redirect("/redirect?id={$id}");

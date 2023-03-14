<?php

use Classes\Ticket;

if (isset($_POST['route'])) {
    $route = $_POST['route'];
    $date = $_POST['dep_date'];

    echo json_encode(
        (new Ticket)->getBookedSeats($route, $date)
    );
}

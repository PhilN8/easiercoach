<?php

use Classes\Route;

$new_cost = $_POST['new_cost'];
$route_id = $_POST['route'];

if ((new Route)->updateCost($route_id, $new_cost))
    echo json_encode(['message' => 1]);
else
    echo json_encode(['message' => 2]);

exit();
<?php

use Classes\Route;

$route = new Route();

if (isset($_POST['route_id'])) {
    $route_id = $_POST['route_id'];
    $cost = $route->getCost($route_id);

    echo json_encode(['cost' => $cost]);
}

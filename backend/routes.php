<?php

require "../autoload.php";

use Classes\Route;

$route = new Route();

if (isset($_POST['route_id'])) {
    $route_id = $_POST['route_id'];
    $cost = $route->getCost($route_id);

    echo json_encode(['cost' => $cost]);
}

if (isset($_POST['add_route'])) {
    $destination = $_POST['destination'];
    $departure = $_POST['departure'];
    $cost = $_POST['cost'];

    $result = $route->newRoute($departure, $destination, $cost);

    if (!$result) {
        echo json_encode(['message' => 1]);
    } else {
        echo json_encode([
            'message' => 2,
            'newRoute' => $route->getRoute($result)
        ]);

        exit();
    }
}

if (isset($_POST['routes']))
    echo json_encode(Route::all());


if (isset($_POST['new_cost'])) {
    $new_cost = $_POST['new_cost'];
    $route_id = $_POST['route'];

    if ($route->updateCost($route_id, $new_cost))
        echo json_encode(['message' => 1]);
    else
        echo json_encode(['message' => 2]);

    exit();
}

if (isset($_POST['deleteRoute'])) {
    $route_id = $_POST['route'];

    if ($route->deleteRoute($route_id))
        echo json_encode(['message' => 1]);
    else
        echo json_encode(['message' => 2]);

    exit();
}

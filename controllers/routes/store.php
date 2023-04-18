<?php

use Classes\Route;

$route = new Route();

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
}

exit();
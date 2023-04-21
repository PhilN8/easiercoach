<?php

use Classes\Route;

$route_id = $_POST['route_id'];
$cost = (new Route)->getCost($route_id);

echo json_encode([
    'cost' => $cost
]);
exit();

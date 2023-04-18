<?php

use Classes\Route;

$route_id = $_POST['route'];

if ((new Route)->deleteRoute($route_id))
    echo json_encode(['message' => 1]);
else
    echo json_encode(['message' => 2]);

exit();


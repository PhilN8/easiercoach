<?php
// error_reporting(0);

// require __DIR__ . "\\..\\autoload.php";
require_once "db_conn.php";

use Classes\Route;

$routes = Route::all();
$route = new Route();

if (isset($_POST['route_id'])) {
    $route_id = $_POST['route_id'];
    $cost = $route->getCost($route_id);

    echo json_encode(['cost' => $cost]);
}

// if (isset($_POST['searchRoute'])) {
//     $destination = $_POST['destination'];
//     $departure = $_POST['departure'];
//     $search_sql = "SELECT * FROM `tbl_routes` WHERE `destination`='$destination' AND `departure`='$departure'";

//     $result = $conn->query($search_sql)->fetch_assoc();

//     if (is_null($result))
//         echo json_encode(['msg' => 'No error detected']);
//     else
//         echo json_encode($result);
// }

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
            // 'routes' => $route->getAllRoutes(),
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
}

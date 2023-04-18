<?php
session_start();

session_start();

const BASE_PATH = __DIR__ . "/../";

require BASE_PATH . "Config/functions.php";

spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    require base_path("{$class}.php");
});

$date1 = (new DateTime("07:15:00"));
$date2 = (new DateTime());

// dd($date1->diff($date2)->format("%I minutes %S seconds") > date("10:00:00"));

$router = new \Config\Router();
$routes = require base_path('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);

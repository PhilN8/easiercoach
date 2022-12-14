<?php

use Config\Response;

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/' => 'controllers/index.php',
    '/admin' => 'controllers/admin.php',
    '/about' => 'controllers/about.php',
    '/booking' => 'controllers/booking.php',
    '/login' => 'controllers/login.php',
    '/logout' => 'backend/logout.php',
    '/redirect' => 'controllers/redirect.php',
    '/routes' => 'controllers/routes.php',
    '/services' => 'controllers/services.php',
];

function abort($status = Response::NOT_FOUND)
{
    http_response_code($status);

    $fullPath = "views/{$status}.php";
    if (file_exists($fullPath))
        require $fullPath;
    else
        require "views/404.php";

    die();
}

function routeToController($uri, $routes)
{
    array_key_exists($uri, $routes) ? require $routes[$uri] : abort();
}

routeToController($uri, $routes);

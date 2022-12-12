<?php


// include "autoload.php";
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

// dd($uri);

$routes = [
    '/' => 'controllers/index.php',
    '/easycoach/home' => 'controllers/index.php',
    '/easycoach/routes' => 'router.php',
    '/admin' => 'controllers/admin.php',
    '/about' => 'controllers/about.php',
    '/services' => 'controllers/services.php',
    '/booking' => 'controllers/booking.php',
    '/login' => 'controllers/login.php',
    '/logout' => 'backend/logout.php',
    '/routes' => 'controllers/routes.php',
];

function abort($status = 404)
{
    http_response_code($status);

    // dd($_SERVER['REQUEST_URI']);
    require "views/404.php";
    die();
}

function routeToController($uri, $routes)
{
    if (array_key_exists($uri, $routes))
        require $routes[$uri];
    else {
        abort();
    }
}

routeToController($uri, $routes);

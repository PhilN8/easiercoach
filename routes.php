<?php

$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/services', 'controllers/services.php');
$router->get('/routes', 'controllers/routes/index.php');

// Booking
$router->get('/booking', 'controllers/booking/index.php');
$router->post('/routes/show', 'controllers/routes/show.php');
$router->post('/booking/seats', 'controllers/booking/seats.php');
$router->post('/booking/store', 'controllers/booking/store.php');

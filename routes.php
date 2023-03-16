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

// Redirect
$router->get('/print','controllers/print.php');
$router->get('/redirect','controllers/redirect.php');
$router->post('/booking/show', 'controllers/booking/show.php');

// Login
$router->get('/login', 'controllers/login/index.php')->only('guest');
$router->post('/login', 'controllers/login/authorize.php');

$router->get('/logout', 'controllers/logout.php');

// Admin
$router->get('/admin', 'controllers/admin.php')->only('auth');
$router->post('/routes/store', 'controllers/routes/store.php')->only('auth');
$router->patch('/routes/update', 'controllers/routes/update.php')->only('auth');
$router->delete('/routes/destroy', 'controllers/routes/destroy.php')->only('auth');

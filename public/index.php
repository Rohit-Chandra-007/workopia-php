<?php

require '../helper.php';

// routes
$routes = [
    '/' => 'app/controller/home.php',
    '/listings' => 'app/controller/listings/index.php',
    '/listings/create' => 'app/controller/listings/create.php',
    '404' => 'app/controller/error/404.php',
    
];

// get the current route
$route = $_SERVER['REQUEST_URI'];


if (array_key_exists($route, $routes)) {
    require basePath($routes[$route]);
} else {
    require basePath($routes['404']);
}

<?php

require '../helper.php';

require basePath('Router.php');

$router = new Router();

$routes = require basePath('routes.php');

// get the current route
$route = $_SERVER['REQUEST_URI'];
// get the current method
$method = $_SERVER['REQUEST_METHOD'];

// inspect($route);
// inspect($method);

$router->route($route, $method);

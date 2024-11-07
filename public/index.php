<?php

require '../helper.php';

require basePath('Router.php');
require basePath('Database.php');

$router = new Router();

$routes = require basePath('routes.php');

// get the current route
$route = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
// get the current method
$method = $_SERVER['REQUEST_METHOD'];

//inspect($route);
// inspect($method);

$router->route($route, $method);

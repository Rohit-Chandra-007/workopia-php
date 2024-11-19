<?php

// require the composer autoload file
require __DIR__ . '/../vendor/autoload.php';

// require the database configuration
use Framework\Router;
use Framework\Session;

Session::start();

require '../helper.php';


//inspectAndDie(session_status());


$router = new Router();

$routes = require basePath('routes.php');

// get the current route
$route = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


$router->route($route);

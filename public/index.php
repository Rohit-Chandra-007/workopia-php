<?php

// start session
session_start();

// require the composer autoload file
require __DIR__ . '/../vendor/autoload.php';
require '../helper.php';

// require the database configuration
use Framework\Router;

$router = new Router();

$routes = require basePath('routes.php');

// get the current route
$route = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


$router->route($route);

<?php
$router->get('/', 'app/controller/home.php');
$router->get('/listings', 'app/controller/listings/index.php');
$router->get('/listings/create', 'app/controller/listings/create.php');
?>
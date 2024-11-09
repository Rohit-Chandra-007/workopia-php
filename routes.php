<?php

$router->get('/', 'HomeController@index');
$router->get('/listings', 'ListingController@index');
$router->get('/listings/create', 'ListingController@create');
$router->get('/listing', 'ListingController@show');
$router->get('/404', 'ErrorController@show404');
$router->get('/403', 'ErrorController@show403');
$router->get('/500', 'ErrorController@show500');
$router->get('/503', 'ErrorController@show503');

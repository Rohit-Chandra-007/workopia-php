<?php

// get the database configuration
$config = require basePath('app/config/db.php');

// create a new database connection
$db = new Database($config);

// get all the posts
$listings = $db->query('SELECT * FROM listings')->fetchAll();
loadView('home', ['listings' => $listings]);

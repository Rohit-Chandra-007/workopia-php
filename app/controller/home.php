<?php

use Framework\Database;

// get the database configuration
$config = require basePath('app/config/db.php');

// create a new database connection
$db = new Database($config);

// get all the posts
$listings = $db->sqlQuery('SELECT * FROM listings')->fetchAll();
loadView('home', ['listings' => $listings]);

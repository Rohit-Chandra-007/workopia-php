<?php

use Framework\Database;

// get the database configuration
$config = require basePath('app/config/db.php');

// create a new database connection
$db = new Database($config);

$id = $_GET['id'] ?? '';

$params = [
    'id' => $id
];
// get the post
$listing = $db->sqlQuery('SELECT * FROM listings WHERE id = :id', $params)->fetch();



loadView('listings/show', ['listing' => $listing]);

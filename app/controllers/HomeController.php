<?php

namespace App\Controllers;

use Framework\Database;

class HomeController
{
    protected $db;

    public function __construct()
    {
        // get the database configuration
        $config = require basePath('app/config/db.php');
        // create a new database connection
        $this->db = new Database($config);
    }


    public function index()
    {
        // get all the posts
        $listings = $this->db->sqlQuery('SELECT * FROM listings LIMIT 6')->fetchAll();
        loadView('home', ['listings' => $listings]);
    }
}

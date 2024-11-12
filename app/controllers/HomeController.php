<?php

namespace App\Controllers;

use Framework\Database;

class HomeController
{
    protected $db;

    /**
     * HomeController constructor.
     * @param Database $db
     * @return void
     */

    public function __construct()
    {
        // get the database configuration
        $config = require basePath('config/_db.php');
        // create a new database connection
        $this->db = new Database($config);
    }

    /**
     * Show the home page
     * 
     * @return void
     */
    public function index()
    {
        // get all the posts
        $listings = $this->db->sqlQuery('SELECT * FROM listings LIMIT 6')->fetchAll();
        loadView('home', ['listings' => $listings]);
    }
}

<?php

namespace App\controllers;

use Exception;
use Framework\Database;

class HomeController
{
    protected $db;

    /**
     * HomeController constructor.
     * @throws Exception
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
        $listings = $this->db->sqlQuery('SELECT * FROM listings ORDER BY created_at DESC LIMIT 6')->fetchAll();
        loadView('home', ['listings' => $listings]);
    }
}

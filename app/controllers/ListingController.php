<?php

namespace App\Controllers;

use Framework\Database;

class ListingController
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
        $listings = $this->db->sqlQuery('SELECT * FROM listings')->fetchAll();
        loadView('listings/index', ['listings' => $listings]);
    }

    public function create()
    {
        loadView('listings/create');
    }

    public function show()
    {
        $id = $_GET['id'] ?? '';

        $params = [
            'id' => $id
        ];
        // get the post
        $listing = $this->db->sqlQuery('SELECT * FROM listings WHERE id = :id', $params)->fetch();

        loadView('listings/show', ['listing' => $listing]);
    }
}

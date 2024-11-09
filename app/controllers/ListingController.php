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

    /**
     * Show all the listings page
     *
     * @return void
     */
    public function index()
    {
        // get all the posts
        $listings = $this->db->sqlQuery('SELECT * FROM listings')->fetchAll();
        loadView('listings/index', ['listings' => $listings]);
    }

    /**
     * Show the create listing page
     *
     * @return void
     */
    public function create()
    {
        loadView('listings/create');
    }

    /**
     * Show the listing page
     *
     * @return void
     */
    public function show($params)
    {
        $id = $params['id'] ?? '';

        $params = [
            'id' => $id
        ];
        // get the post
        $listing = $this->db->sqlQuery('SELECT * FROM listings WHERE id = :id', $params)->fetch();

        // if the post is not found, show a 404 page
        if (!$listing) {
            ErrorController::show404("Listing not found");
            return;
        }
        loadView('listings/show', ['listing' => $listing]);
    }
}

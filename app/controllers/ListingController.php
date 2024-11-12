<?php

namespace App\Controllers;

use Framework\Database;
use Framework\Validation;

class ListingController
{
    protected $db;

    public function __construct()
    {
        // get the database configuration
        $config = require basePath('config/_db.php');
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
     * @param array $params
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

    /**
     * Store a new listing
     *
     * @return void
     */
    public function store()
    {
        $allowedField = ['title', 'description', 'job_type', 'salary', 'requirements', 'benefits', 'tags', 'company', 'address', 'city', 'state', 'phone', 'email'];

        $newListingData = array_intersect_key($_POST, array_flip($allowedField));

        $newListingData['user_id'] = 1;

        $newListingData = array_map('sanitize', $newListingData);

        $requiredFields = ['title', 'description', 'city', 'state', 'phone', 'email'];

        $errors = [];

        foreach ($requiredFields as $field) {
            if (empty($newListingData[$field]) || !Validation::string($newListingData[$field])) {

                $errors[$field] = ucfirst($field) . " is required";
            }
        }

        if (!empty($errors)) {
            // reload view with errors
            loadView('listings/create', ['errors' => $errors, 'listing' => $newListingData]);
        } else {
            // insert into database

            $fields = [];

            foreach ($newListingData as $field => $value) {
                $fields[] = $field;
            }

            $fields = implode(',', $fields);

            // inspectAndDie($fields);

            $values = [];
            foreach ($newListingData as $field => $value) {
                if ($value === '') {
                    $newListingData[$field] = null;
                }
                $values[] = ':' . $field;
            }
            $values = implode(',', $values);

            $sql = "INSERT INTO listings ({$fields}) VALUES ({$values})";
            $this->db->sqlQuery($sql, $newListingData);

            // redirect to the listing page
            redirect('/listings');
        }
    }

    /**
     * delete a listing
     * @param array $params
     */
    public function destroy($params)
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



        $this->db->sqlQuery('DELETE FROM listings WHERE id = :id', $params);

        redirect('/listings');
    }
}

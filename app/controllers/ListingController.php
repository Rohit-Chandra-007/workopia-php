<?php

namespace App\controllers;

use Exception;
use Framework\Authorization;
use Framework\Database;
use Framework\Session;
use Framework\Validation;

class ListingController
{
    protected $db;

    /**
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
     * Show all the listings page
     *
     * @return void
     */
    public function index()
    {
        // get all the posts
        $listings = $this->db->sqlQuery('SELECT * FROM listings ORDER BY created_at DESC')->fetchAll();
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
        $id = isset($params['id']) ? $params['id'] : '';

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


        // associative array of the new listing data
        $newListingData = array_intersect_key($_POST, array_flip($allowedField));

        $newListingData['user_id'] = Session::getSession('user')['id'];

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

            $sql = "INSERT INTO listings ($fields) VALUES ($values)";
            $this->db->sqlQuery($sql, $newListingData);

            Session::setFlashMessage('success_message', 'Listing created successfully');

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
        $id = isset($params['id']) ? $params['id'] : '';

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

        // Authentication
        if (!Authorization::isOnwer($listing->user_id)) {
            Session::setFlashMessage('error_message', 'You are not authorize to delete this listing');
            return redirect('/listings/' . $listing->id);

        }


        $this->db->sqlQuery('DELETE FROM listings WHERE id = :id', $params);

        // show a success message

        Session::setFlashMessage('success_message', 'Listing deleted successfully');

        redirect('/listings');
    }


    /**
     * Show edit listing page
     * @param array $params
     *
     * @return void
     */
    public function edit($params)
    {
        $id = isset($params['id']) ? $params['id'] : '';

        $params = [
            'id' => $id
        ];
        // get the post
        // her we are using the sqlQuery method to get a single row
        // this is object @param mixed $listing
        $listing = $this->db->sqlQuery('SELECT * FROM listings WHERE id = :id', $params)->fetch();

        // if the post is not found, show a 404 page
        if (!$listing) {
            ErrorController::show404("Listing not found");
            return;
        }

        //inspectAndDie($listing);
        loadView('listings/edit', ['listing' => $listing]);
    }


    /**
     * Update a listing
     * @param array $params
     *
     * @return void
     */

    public function update($params)
    {
        $id = isset($params['id']) ? $params['id'] : '';

        $params = [
            'id' => $id
        ];
        // get the post
        // her we are using the sqlQuery method to get a single row
        // this is object @param mixed $listing
        $listing = $this->db->sqlQuery('SELECT * FROM listings WHERE id = :id', $params)->fetch();

        // if the post is not found, show a 404 page
        if (!$listing) {
            ErrorController::show404("Listing not found");
            return;
        }

        // Authentication
        if (!Authorization::isOnwer($listing->user_id)) {
            Session::setFlashMessage('error_message', 'You are not authorize to update this listing');
            return redirect('/listings/' . $listing->id);

        }

        $allowedField = ['title', 'description', 'job_type', 'salary', 'requirements', 'benefits', 'tags', 'company', 'address', 'city', 'state', 'phone', 'email'];

        // associative array of the new listing data

        $updateValues = array_intersect_key($_POST, array_flip($allowedField));

        $updateValues = array_map('sanitize', $updateValues);

        $requiredFields = ['title', 'description', 'city', 'state', 'phone', 'email'];

        $errors = [];
        foreach ($requiredFields as $field) {
            if (empty($updateValues[$field]) || !Validation::string($updateValues[$field])) {
                $errors[$field] = ucfirst($field) . " is required";
            }
        }

        if (!empty($errors)) {
            // reload view with errors
            loadView('listings/edit', ['errors' => $errors, 'listing' => $listing]);
        } else {
            // update the listing
            $fields = [];
            foreach ($updateValues as $field => $value) {
                $fields[] = $field . ' = :' . $field;
            }

            $fields = implode(',', $fields);

            $sql = "UPDATE listings SET $fields WHERE id = :id";

            $updateValues['id'] = $id;


            $this->db->sqlQuery($sql, $updateValues);


            Session::setFlashMessage('success_message', 'Listing updated successfully');


            // redirect to the listing page
            redirect('/listings/' . $id);
        }
    }



    /**
     * Search listings by keyword/location
     *
     * @return void
     */
    public function search()
    {


        //inspectAndDie($_GET);
        $keywords = isset($_GET['keywords']) ? $_GET['keywords'] : '';
        $location = isset($_GET['location']) ? $_GET['location'] : '';

        $params = [
            'keyword' => "%{$keywords}%",
            'location' => "%{$location}%"
        ];

        $query = "SELECT * FROM listings WHERE (title LIKE :keyword OR description LIKE :keyword OR tags LIKE :keyword) AND (city LIKE :location OR state LIKE :location)";

        $listings = $this->db->sqlQuery($query, $params)->fetchAll();

        loadView('listings/index', ['listings' => $listings]);
    }


}

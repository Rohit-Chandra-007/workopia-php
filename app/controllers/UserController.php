<?php

namespace App\controllers;

use Exception;
use Framework\Database;
use Framework\Validation;

class UserController
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
     *  show the login page
     * @return void
     */
    public function login()
    {
        loadView('user/login');
    }

    /**
     * show the register page
     * @return void
     */
    public function register()
    {
        loadView('user/create');
    }


    /**
     *
     * Create a new user and store in database
     *
     * @return void
     */

    public function createUser()
    {
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $city = $_POST['city'] ?? '';
        $state = $_POST['state'] ?? '';
        $password = $_POST['password'] ?? '';
        $confirm_password = $_POST['confirm_password'] ?? '';

        // validate the user input
        $errors = [];
        if (!Validation::email($email)) {
            $errors['email'] = 'Please Enter Valid Email Address';
        }
        if (!Validation::string($name, 2, 50)) {
            $errors['name'] = 'Name must be between 2 to 50 character';
        }
        if (!Validation::string($password, 6)) {
            $errors['password'] = 'Password atleast contain 6 letter';
        }
        if (!Validation::match($password, $confirm_password)) {
            $errors['password'] = 'Password did not match please check it';
        }


        if (!empty($errors)) {
            loadView('user/create', [
                'errors' => $errors,
                'user' => [
                    'name' => $name,
                    'email' => $email,
                    'city' => $city,
                    'state' => $state,
                ]
            ]);
            exit();
        }

        // let check if email address already exits

        $param = [
            'email' => $email
        ];

        $user = $this->db->sqlQuery('SELECT * FROM users WHERE email=:email', $param);
        if ($user) {
            $errors['email'] = 'That Email Already Exists';
            loadView('user/create', [
                'errors' => $errors,
                'user' => [
                    'name' => $name,
                    'email' => $email,
                    'city' => $city,
                    'state' => $state,
                ]
            ]);
            exit();
        }

    }
}

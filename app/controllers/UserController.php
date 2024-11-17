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
     * Create a new user with the provided name and email.
     *
     * This function connects to the database, prepares and
     * executes an SQL statement to insert a new user record.
     *
     * @param string $name The name of the user to create.
     * @param string $email The email of the user to create.
     *
     * @return void
     */

    public function createUser()
    {
        loadView('user/create');
    }

    public function getUser($id)
    {
        // Connect to the database
        $conn = new mysqli('localhost', 'username', 'password', 'database');

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and execute
        $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        // Get result
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "id: " . $row["id"] . " - Name: " . $row["name"] . " - Email: " . $row["email"] . "<br>";
            }
        } else {
            echo "0 results";
        }

        // Close connections
        $stmt->close();
        $conn->close();
    }
}

?>
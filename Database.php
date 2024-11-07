<?php
class Database
{
    public $connection;
    /**
     * contructor for database class
     *
     * @param array $config
     */
    public function __construct($config)
    {

        $dsn = "mysql:host={$config['host']};dbname={$config['database']};port:{$config['port']};charset=utf8";

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,

        ];

        try {

            $this->connection = new PDO($dsn, $config['username'], $config['password'], $options);
        } catch (PDOException $e) {
            throw new Exception('Database Connection failed:' . $e->getMessage());
        }
    }


    /**
     * Query the database
     *
     * @param string $query
     * @return PDOStatement
     * @throws PDOException
     */
    public function query($qurey)
    {


        try {

            $stmt = $this->connection->prepare($qurey);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            throw new Exception('Query failed:' . $e->getMessage());
        }
    }
}

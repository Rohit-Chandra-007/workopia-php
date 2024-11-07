<?php
class Database
{
    public $connection;
    public function __construct($config)
    {

        $dsn = "mysql:host={$config['host']};dbname={$config['database']};port:{$config['port']};charset=utf8";
    }
}

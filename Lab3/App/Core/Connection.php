<?php

namespace App\Core;

use PDO;
use PDOException;
use Dotenv\Dotenv;

class Connection
{
    private static $instance = null;
    private static $connect = null;

    public function __construct()
    {
        
        $dotenv = Dotenv::createImmutable(dirname(dirname(__DIR__)));
        $dotenv->load();

        // Get database configuration from environment variables
        $host = $_ENV['DB_HOST'];
        $dbname = $_ENV['DB_NAME'];
        $username = $_ENV['DB_USERNAME'];
        $password = $_ENV['DB_PASSWORD'];

        try {
            // Configure DSN
            $dsn = "mysql:host={$host};dbname={$dbname};charset=utf8mb4";

            // Create PDO connection
            $con = new PDO($dsn, $username, $password);
            self::$connect = $con;
        } catch (PDOException $ex) {
            $mess = $ex->getMessage();
            $data['message'] = $mess;
            die();
        }
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            new Connection();
            self::$instance = self::$connect;
        }
        return self::$instance;
    }
}

<?php

require_once('./configs/database.php');
class Database {
    public static function connect() {
        $dbConfig = Config::getDbConfig();

        try {
            $db = new PDO("mysql:host=" . $dbConfig['host'] . ";dbname=" . $dbConfig['dbname'], $dbConfig['username'], $dbConfig['password']);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
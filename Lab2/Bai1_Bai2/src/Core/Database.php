<?php
namespace Core;
use PDO;
use PDOException;

class Database {
    public $db;

    public function __construct() {
        $dbConfig = [
            "host" => "localhost",
            "username" => "root",
            "password" => "",
            "dbname" => "lab"
        ];

        try {
            $this->db = new PDO("mysql:host=" . $dbConfig['host'] . ";dbname=" . $dbConfig['dbname'], $dbConfig['username'], $dbConfig['password']);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo '<div class="alert alert-success" role="alert">Kết nối database thành công!</div>';
        } catch(PDOException $e) {
            echo '<div class="alert alert-danger" role="alert">Lỗi kết nối database: ' . $e->getMessage() . '</div>';
        }
    }
}
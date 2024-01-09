<?php

include 'core/Database.php';

class UserModel {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function getUserByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user;
    }
}
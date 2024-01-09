<?php

include 'core/Database.php';

class LecturerModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getAllLecturers()
    {
        $stmt = $this->db->prepare("SELECT 
        t.id,
        t.name,
        t.email,
        t.phone,
        t.address,
        t.avatar,
        s.name AS specialty_name,
        ns.name AS narrowspecialty_name
     FROM 
        teachers AS t
        INNER JOIN specialties AS s ON t.specialty_id = s.id
        LEFT JOIN narrow_specialties AS ns ON s.id = ns.specialty_id
        GROUP BY t.id;");
        $stmt->execute();
        $lecturers = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $lecturers;
    }
}

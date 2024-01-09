<?php
include 'App/Model/LecturerModel.php';

class LecturerController {
    private $lecturerModel;

    public function __construct() {
        $this->lecturerModel = new LecturerModel();
    }

    public function showLecturerList() {
        $lecturers = $this->lecturerModel->getAllLecturers();
        include 'App/Views/lecturers/lecturer-list.php';
        extract($lecturers);
    }
}
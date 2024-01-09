<?php
require 'Models/CoursesModel.php';

$list_of_courses = get_courses();
$semester = (isset($_GET['semester']) ? $_GET['semester'] : '');
$selected_course = find_by_semester($list_of_courses, $semester);

include 'Views/index.php';
?>
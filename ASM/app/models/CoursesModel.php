<?php

namespace App\models;

use Illuminate\framework\base\Model;

class CoursesModel extends Model
{
    protected $table = 'courses';

    protected $columns = [
        'id',
        'name',
        'description',
        'time',
        'quizz',
        'sermon',
        'retake',
        'image'
    ];


    public function getAll()
    {
        return $this->select('*')->tableName('courses as c')->join('class_options as c_p', 'c_p.course_id = c.id')->join('teacher_options as t_p', 't_p.course_id = c.id')->join('teachers as t', 't.id = t_p.teacher_id')->get();
    }

    public function getAllCourseByFeedBack()
    {
        return $this->select('c.id, c.name, c.image, s.name as nameSemeste, c.id AS course_id, GROUP_CONCAT(DISTINCT cl.name SEPARATOR ", ") AS combined_class_names, GROUP_CONCAT(DISTINCT t.name SEPARATOR ", ") AS combined_teacher_names, COUNT(DISTINCT e.id) as qty_feedback, (SUM(DISTINCT cl.number_students) - COUNT(DISTINCT e.id)) AS qty_not_feedback')
            ->tableName('courses AS c')
            ->join('class_options AS c_p', 'c_p.course_id = c.id')
            ->join('classes AS cl', 'cl.id = c_p.class_id')
            ->join('teacher_options AS t_p', 't_p.course_id = c.id')
            ->join('teachers AS t', 't.id = t_p.teacher_id')
            ->leftJoin('semester_options AS s_p', 's_p.course_id = c.id')
            ->leftJoin('semesters AS s', 's.id = s_p.semester_id')
            ->leftJoin('evaluations AS e', 'e.course_id = c.id')
            ->groupBy('c.id')
            ->get();
    }
    public function getDetailCourse($id)
    {
        return $this->select('*,c.name as courseName, c.id as idCourse, c.description as descriptionCourse, t.description as descriptionTeacher, t.name as nameTeacher')->tableName('courses as c')->join('class_options as c_p', 'c_p.course_id = c.id')->join('teacher_options as t_p', 't_p.course_id = c.id')->join('teachers as t', 't.id = t_p.teacher_id')->whereCondition('c.id', '=', $id)->groupBy('c.id')->get();
    }
}
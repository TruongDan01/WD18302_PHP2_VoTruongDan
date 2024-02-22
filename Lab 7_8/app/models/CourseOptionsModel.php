<?php

namespace App\models;

use Illuminate\framework\base\Model;

class CourseOptionsModel extends Model
{
    protected $table = 'course_options';

    protected $columns = [
        'form_id',
        'course_id',
    ];

    public function getAll()
    {
        return $this->select('*, COUNT(e.id)')->tableName('courses as c')->join('evaluations as e', 'e.course_id = c.id')->join('class_options as c_p', 'c_p.course_id = c.id')->join('teacher_options as t_p', 't_p.course_id = c.id')->join('teachers as t', 't.id = t_p.teacher_id')->get();
    }
}
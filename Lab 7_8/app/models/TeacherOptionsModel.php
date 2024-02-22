<?php

namespace App\models;

use Illuminate\framework\base\Model;

class TeacherOptionsModel extends Model
{
    protected $table = 'teacher_options';

    protected $columns = [
        'course_id',
        'teacher_id',
    ];

    public function getName($id)
    {
        return $this->select('*, COUNT(t_p.id) as qtyTeacher')->tableName('teacher_options as t_p')->join('teachers as t', 't_p.teacher_id = t.id')->whereCondition('t_p.course_id', '=', $id)->get();
    }

}
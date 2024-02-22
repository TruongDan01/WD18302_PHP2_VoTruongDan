<?php

namespace App\models;

use Illuminate\framework\base\Model;

class ClassesModel extends Model
{
    protected $table = 'classes';

    protected $columns = [
        'id',
        'name',
        'number_students'
    ];

    public function getAllClassById($id)
    {
        return $this->select('cl.id, cl.name')->tableName('classes as cl')->join('class_options as c_p', 'c_p.class_id = cl.id')->join('courses as c', 'c_p.course_id = c.id')->whereCondition('c_p.course_id', '=', $id)->get();
    }
}
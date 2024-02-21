<?php

namespace App\models;

use Illuminate\framework\base\Model;

class FormsModel extends Model
{
    protected $table = 'evaluation_forms';

    protected $columns = [
        'form_id',
        'title',
    ];


    public function getAll()
    {
        return $this->select('*')->tableName('teachers')->get();
    }

    public function getFormById($id)
    {
        return $this->select('*')->tableName('evaluation_forms as f')->join('course_options as c_p', 'f.form_id = c_p.form_id')->whereCondition('c_p.course_id', '=', $id)->first();
    }
}
<?php

namespace App\models;

use Illuminate\framework\base\Model;

class ClassOptionsModel extends Model
{
    protected $table = 'class_options';

    protected $columns = [
        'form_id',
        'course_id',
        'class_id',
    ];
}
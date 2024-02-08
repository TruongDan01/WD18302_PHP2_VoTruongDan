<?php

namespace App\models;

use Illuminate\framework\base\Model;

class ClassesModel extends Model
{
    protected $table = 'classes';

    protected $columns = [
        'id',
        'course_id',
        'name' 
    ];
}
<?php

namespace App\models;

use Illuminate\framework\base\Model;

class SemesterOptionsModel extends Model
{
    protected $table = 'semester_options';

    protected $columns = [
        'form_id',
        'semester_id',
        'course_id',
    ];
}
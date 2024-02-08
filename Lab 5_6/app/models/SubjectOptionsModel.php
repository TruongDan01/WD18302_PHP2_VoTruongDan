<?php

namespace App\models;

use Illuminate\framework\base\Model;

class SubjectOptionsModel extends Model
{
    protected $table = 'subject_options';

    protected $columns = [
        'form_id',
        'subject_id',
    ];
}
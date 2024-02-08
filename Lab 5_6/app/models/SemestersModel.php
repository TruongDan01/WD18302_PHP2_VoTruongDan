<?php

namespace App\models;

use Illuminate\framework\base\Model;

class SemestersModel extends Model
{
    protected $table = 'semesters';

    protected $columns = [
        'id',
        'name' 
    ];
}
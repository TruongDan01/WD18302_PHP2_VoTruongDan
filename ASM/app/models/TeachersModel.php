<?php

namespace App\models;

use Illuminate\framework\base\Model;

class TeachersModel extends Model
{
    protected $table = 'teachers';

    protected $columns = [
        'id',
        'name',
        'email',
        'description',
        'avatar',
        'created_at'
    ];
}
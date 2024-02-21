<?php

namespace App\models;

use Illuminate\framework\base\Model;

class UsersModel extends Model
{
    protected $table = 'users';

    protected $columns = [
        'id',
        'name',
        'email',
        'password',
        'role'
    ];
}
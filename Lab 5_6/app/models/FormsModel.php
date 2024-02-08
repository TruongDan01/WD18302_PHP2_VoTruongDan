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
}
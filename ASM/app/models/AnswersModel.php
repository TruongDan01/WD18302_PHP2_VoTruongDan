<?php

namespace App\models;

use Illuminate\framework\base\Model;

class AnswersModel extends Model
{
    protected $table = 'answers';

    protected $columns = [
        'question_id',
        'answer_type' 
    ];
}
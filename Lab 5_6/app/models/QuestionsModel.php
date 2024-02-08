<?php

namespace App\models;

use Illuminate\framework\base\Model;

class QuestionsModel extends Model
{
    protected $table = 'questions';

    protected $columns = [
        'question_id',
        'form_id', 
        'question_text',
    ];
}
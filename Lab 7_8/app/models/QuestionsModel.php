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

    public function getQuestionById($id)
    {
        return $this->select('*')->tableName('questions as q')->join('evaluation_forms as f', 'f.form_id = q.form_id')->join('answers as a', 'a.question_id = q.question_id')->whereCondition('q.form_id', '=', $id)->get();
    }
}
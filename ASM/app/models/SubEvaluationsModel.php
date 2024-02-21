<?php

namespace App\models;

use Illuminate\framework\base\Model;

class SubEvaluationsModel extends Model
{
    protected $table = 'sub_evaluations';

    protected $columns = [
        'evaluation_id',
        'question_id',
        'evaluation_text'
    ];
}
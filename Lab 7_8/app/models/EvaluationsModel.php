<?php

namespace App\models;

use Illuminate\framework\base\Model;

class EvaluationsModel extends Model
{
    protected $table = 'evaluations';

    protected $columns = [
        'semester_id',
        'courses_id',
        'class_id',
        'user_id',
        'status'
    ];

    public function getEvaluationByClass($id, $course)
    {
        return $this->select('u.id as userId, e.id as idFeedBack, e.status, u.name as userName, c.name as courseName, u.email, q.question_text, se.evaluation_text')
            ->tableName('evaluations as e')
            ->join('courses as c', 'c.id = e.course_id')
            ->join('sub_evaluations as se', 'se.evaluation_id = e.id')
            ->join('questions as q', 'q.question_id = se.question_id')
            ->join('users as u', 'u.id = e.user_id')
            ->join('classes as s', 's.id = e.class_id')
            ->whereCondition('e.class_id', '=', $id)
            ->whereCondition('c.id', '=', $course)
            ->get();
    }
}
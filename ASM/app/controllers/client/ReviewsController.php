<?php

namespace App\controllers\client;

use Illuminate\framework\Controller;
use Illuminate\framework\Response;
use Illuminate\framework\Request;
use Illuminate\framework\factory\Model;
use Illuminate\framework\base\Validator;
use Illuminate\framework\Session;

class ReviewsController extends Controller
{

    public function store(Request $request)
    {
        if ($request->isPost()) {
            $data = $request->getData();
            $course_id = $data['course'];
            $error = false;

            if (Validator::required($data['class'])) {
                Session::flash('error-class', 'Lớp học không được để trống');
                $error = true;
            }

            if (Validator::required($data['semester'])) {
                Session::flash('error-semester', 'Khóa học không được để trống');
                $error = true;
            }

            if ($error) {
                Response::redirect("/chi-tiet-mon-hoc?id=$course_id");
            } else {
                $dataEvaluation = [
                    'class_id' => $data['class'],
                    'course_id' => $data['course'],
                    'semester_id' => $data['semester'],
                    'user_id' => Session::data('user')['id'],
                ];
    
                $resultEvaluation = Model::create('EvaluationsModel', $dataEvaluation);

                if (!empty($resultEvaluation)) {
                    $evaluations = array();

                    foreach ($data as $key => $value) {
                        if (strpos($key, 'evaluationRadio_') === 0) {
                            $question_id = substr($key, strlen('evaluationRadio_'));
                            $evaluation_text = $value;
                            $evaluations[] = array(
                                'question_id' => $question_id,
                                'evaluation_text' => $evaluation_text,
                                'evaluation_id' => $resultEvaluation
                            );
                        }
                    }

                    foreach ($evaluations as $evaluation) {
                        $resultQuestion = Model::create('SubEvaluationsModel', $evaluation);
                    }
                    if ($resultQuestion) {
                        Session::flash('msg-success', 'Gửi đánh giá thành công');
                        Response::redirect("/chi-tiet-mon-hoc?id=$course_id");

                    } else {
                        Session::flash('msg-error', 'Gửi đánh giá không thành công');
                        Response::redirect("/chi-tiet-mon-hoc?id=$course_id");

                    }
                }
            }
        }

    }
}

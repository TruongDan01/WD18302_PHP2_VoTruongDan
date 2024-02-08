<?php

namespace App\controllers\admin;

use Illuminate\framework\Controller;
use Illuminate\framework\Response;
use Illuminate\framework\Request;
use Illuminate\framework\factory\Model;
use Illuminate\framework\base\Validator;
use App\models\FormsModel;
use Dompdf\Dompdf;
use Dompdf\Options;

class FeedBackController extends Controller
{
    public function index()
    {
        $classes = Model::all('ClassesModel');
        $semesters = Model::all('SemestersModel');
        $this->setLayout('admin');

        echo $this->view('pages/admin/add-form', [
            'classes' => $classes,
            'semesters' => $semesters
        ]);
    }

    public function show()
    {
        $this->setLayout('admin');

        echo $this->view('pages/admin/list-feedback', [
            ''
        ]);
    }

    public function store(Request $request)
    {
        if ($request->isPost()) {
            if (
                Validator::required($request->getData()['title'])
                // || Validator::required($request->getData()['classes'])
                // || Validator::required($request->getData()['subjects'])
                // || Validator::required($request->getData()['semesters'])
                // || Validator::required($request->getData()['semesters'])
            ) {
                $_SESSION['create-form'] = 'Thêm đánh giá thât bại - Còn trường chưa điền vào';
            } elseif (
                !Validator::minLength($request->getData()['title'], 5)
            ) {
                $_SESSION['create-form'] = 'Thêm đánh giá thất bại - Tiêu đề quá ngắn (tối thiểu 5 ký tự)';
            }
            // elseif (
            //     !Validator::minLength($request->getData()['evaluationQuestion'], 10)
            // ) {
            //     $_SESSION['create-form'] = 'Thêm đánh giá thất bại - Câu hỏi đánh giá quá ngắn (tối thiểu 10 ký tự)';
            // }
            // $this->setLayout('admin');
            else {
                $dataForm = [
                    'title' => $request->getData()['title']
                ];
                $dataClass = json_decode($_POST['classes'], true);
                $dataSubject = json_decode($_POST['subjects'], true);
                $dataSemester = json_decode($_POST['semesters'], true);
                $dataQuestion = json_decode($_POST['questions'], true);

                $lastInsertId = Model::create('FormsModel', $dataForm);

                foreach ($dataClass as $class) {
                    $classData= [
                        'form_id' => $lastInsertId,
                        'class_id' => $class
                    ];
                    $resultClass = Model::create('ClassOptionsModel', $classData);
                }

                foreach ($dataSemester as $semester) {
                    $semesterData= [
                        'form_id' => $lastInsertId,
                        'semester_id' => $semester
                    ];
                    $resultSemester = Model::create('SemesterOptionsModel', $semesterData);
                }

                // foreach ($dataSubject as $subject) {
                //     $subjectData= [
                //         'form_id' => $lastInsertId,
                //         'subject_id' => $subject
                //     ];
                //     $resultSubject = Model::create('SubjectOptionsModel', $subjectData);
                // }
                foreach ($dataQuestion as $question) {
                    $questionData = [
                        'form_id' => $lastInsertId,
                        'question_text' => $question['question']
                    ];
                    $questionId = Model::create('QuestionsModel', $questionData);

                    $answerData = [
                        'question_id' => $questionId,
                        'answer_type' => $question['answerType']
                    ];

                    $questionId = Model::create('AnswersModel', $answerData);

                }
                if ($lastInsertId) {
                    $_SESSION['create-form'] = 'Thêm form đánh giá thành công';
                } else {
                    $_SESSION['create-form'] = 'Thêm form đánh giá thât bại';
                }

                $dataForm = [
                    'form_id' => $lastInsertId,
                    'question_text' => 123
                ];
            }

           $this->index();
        }

        unset($_SESSION['create-form']);
        $this->index();
    }
}

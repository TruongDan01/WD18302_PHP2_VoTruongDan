<?php

namespace App\controllers\admin;

use Illuminate\framework\Controller;
use Illuminate\framework\Response;
use Illuminate\framework\Request;
use Illuminate\framework\factory\Model;
use Illuminate\framework\base\Validator;
use Illuminate\framework\Session;
use App\models\ClassesModel;
use App\models\EvaluationsModel;

class FeedBackController extends Controller
{
    public function index()
    {
        $classes = Model::all('ClassesModel');
        $courses = Model::all('CoursesModel');
        $semesters = Model::all('SemestersModel');
        $this->setLayout('admin');

        echo $this->view('pages/admin/add-form', [
            'classes' => $classes,
            'courses' => $courses,
            'semesters' => $semesters
        ]);
    }

    public function show(Request $request)
    {
        $data = $request->getParams();
        $id = $data['id'];
        $classModel = new ClassesModel();
        $classes = $classModel->getAllClassById($id);
        $evaluationModel = new EvaluationsModel();

        $evaluationsByClass = array();

        foreach ($classes as $class) {
            $idClass = $class['id'];
            $evaluations = $evaluationModel->getEvaluationByClass($idClass, $id);

            $evaluationsByClass[$idClass] = $evaluations;
        }
        $this->setLayout('admin');

        echo $this->view('pages/admin/list-users', [
            'classes' => $classes,
            'evaluations' => $evaluationsByClass

        ]);
    }

    public function store(Request $request)
    {
        if ($request->isPost()) {
            $dataTitle = [
                'title' => $request->getData()['title']
            ];
            $dataClass = json_decode($_POST['classes'], true);
            $dataCourse = json_decode($_POST['subjects'], true);
            $dataSemester = json_decode($_POST['semesters'], true);
            $dataQuestion = json_decode($_POST['questions'], true);
            $error = false;

            if (Validator::required($request->getData()['title'])) {
                Session::flash('error-title', 'Tiêu đề không được để trống');
                $error = true;
            } else if (!Validator::minLength($request->getData()['title'], 5)) {
                Session::flash('error-title', 'Tiêu đề quá ngắn (tối thiểu 5 ký tự)');
                $error = true;
            }

            if (Validator::required($dataClass)) {
                Session::flash('error-class', 'Lớp học không được để trống');
                $error = true;
            }

            if (Validator::required($dataQuestion)) {
                Session::flash('error-question', 'Đánh giá không được để trống');
                $error = true;
            }
            if (Validator::required($dataSemester)) {
                Session::flash('error-semester', 'Khóa học không được để trống');
                $error = true;
            }
            if (Validator::required($dataCourse)) {
                Session::flash('error-subject', 'Môn học không được để trống');
                $error = true;
            }
            if ($error) {
                $response = new Response();
                $response->redirect('/admin/feedback/new');
            } else {
                $lastInsertId = Model::create('FormsModel', $dataTitle);

                foreach ($dataClass as $class) {
                    $classData = [
                        'form_id' => $lastInsertId,
                        'class_id' => $class
                    ];
                    $resultClass = Model::create('ClassOptionsModel', $classData);
                }

                foreach ($dataSemester as $semester) {
                    $semesterData = [
                        'form_id' => $lastInsertId,
                        'semester_id' => $semester
                    ];
                    $resultSemester = Model::create('SemesterOptionsModel', $semesterData);
                }

                foreach ($dataCourse as $course) {
                    $courseData = [
                        'form_id' => $lastInsertId,
                        'course_id' => $course
                    ];
                    $resultCourse = Model::create('CourseOptionsModel', $courseData);
                }
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
                    Session::flash('msg-success', 'Thêm form đánh giá thành công');
                } else {
                    Session::flash('msg-error', 'Thêm form đánh giá thât bại');
                }

            }

            $this->index();
        }
        $this->index();
    }

    public function update(Request $request)
    {
        $data = $request->getParams();
        $id = $data['id'];
        $status = ['status' => 1];
        $updateFeedBack = Model::update('EvaluationsModel', $id, $status);

        echo '<script>window.history.back();</script>';
        exit();
    }
}

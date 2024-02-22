<?php

namespace App\controllers\admin;

use Illuminate\framework\Controller;
use Illuminate\framework\Response;
use Illuminate\framework\Request;
use Illuminate\framework\factory\Model;
use Illuminate\framework\base\Validator;
use Illuminate\framework\Session;
use App\models\CoursesModel;

class CoursesController extends Controller
{
    public function index()
    {
        $classes = Model::all('ClassesModel');
        $teachers = Model::all('TeachersModel');
        $semesters = Model::all('SemestersModel');
        $this->setLayout('admin');

        echo $this->view('pages/admin/add-course', [
            'classes' => $classes,
            'teachers' => $teachers,
            'semesters' => $semesters
        ]);
    }

    public function show()
    {
        // $classes = Model::all('ClassesModel');
        $courseModel = new CoursesModel();
        $courses = $courseModel->getAllCourseByFeedBack();
        $this->setLayout('admin');

        echo $this->view('pages/admin/list-feedback', [
            // 'classes' => $classes,
            'courses' => $courses
        ]);
    }


    public function store(Request $request)
    {
        if ($request->isPost()) {
            $dataClass = json_decode($_POST['classes'], true);
            $dataTeacher = json_decode($_POST['teachers'], true);
            $dataSemester = json_decode($_POST['semesters'], true);
            $error = false;

            if (Validator::required($request->getData()['name'])) {
                Session::flash('error-name', 'Tiêu đề không được để trống');
                $error = true;
            } else if (!Validator::minLength($request->getData()['name'], 5)) {
                Session::flash('error-name', 'Tiêu đề quá ngắn (tối thiểu 5 ký tự)');
                $error = true;
            }

            if (Validator::required($dataClass)) {
                Session::flash('error-class', 'Lớp không được để trống');
                $error = true;
            }

            if (Validator::required($dataTeacher)) {
                Session::flash('error-teacher', 'Giảng viên không được để trống');
                $error = true;
            }

            if (Validator::required($dataSemester)) {
                Session::flash('error-semester', 'Khóa học không được để trống');
                $error = true;
            }

            if (Validator::required($request->getData()['description'])) {
                Session::flash('error-description', 'Mô tả không được để trống');
                $error = true;
            } else if (!Validator::minLength($request->getData()['description'], 2)) {
                Session::flash('error-description', 'Mô tả quá ngắn (tối thiểu 2 ký tự)');
                $error = true;
            } else if (!Validator::maxLength($request->getData()['description'], 255)) {
                Session::flash('error-description', 'Mô tả quá dài (tối thiểu 255 ký tự)');
                $error = true;
            }

            if (Validator::required($request->getData()['time'])) {
                Session::flash('error-time', 'Thời gian không được để trống');
                $error = true;
            } else if (!Validator::numeric($request->getData()['time'])) {
                Session::flash('error-time', 'Thời gian phải là số');
                $error = true;
            }

            if (Validator::required($request->getData()['sermon'])) {
                Session::flash('error-sermon', 'Bài giảng không được để trống');
                $error = true;
            } else if (!Validator::positiveNumeric($request->getData()['sermon'])) {
                Session::flash('error-sermon', 'Bài giảng phải là số và lớn hơn 0');
                $error = true;
            }

            if (Validator::required($request->getData()['quizz'])) {
                Session::flash('error-quizz', 'Câu hỏi không được để trống');
                $error = true;
            } else if (!Validator::positiveNumeric($request->getData()['quizz'])) {
                Session::flash('error-quizz', 'Câu hỏi phải là số và lớn hơn 0');
                $error = true;
            }

            if (Validator::required($request->getData()['retake'])) {
                Session::flash('error-retake', 'Thi lại không được để trống');
                $error = true;
            } else if (!Validator::positiveNumeric($request->getData()['retake'])) {
                Session::flash('error-retake', 'Thi lại phải là số và lớn hơn 0');
                $error = true;
            }

            if ($error) {
                Session::flash('msg-error', 'Thêm môn học thât bại');
                http_response_code(500);
            } else {
                $dataCourse = [
                    'name' => $request->getData()['name'],
                    'description' => $request->getData()['description'],
                    'time' => $request->getData()['time'],
                    'sermon' => $request->getData()['sermon'],
                    'quizz' => $request->getData()['quizz'],
                    'retake' => $request->getData()['retake'],
                ];

                $lastInsertId = Model::create('CoursesModel', $dataCourse);

                foreach ($dataClass as $class) {
                    $classData = [
                        'class_id' => $class,
                        'course_id' => $lastInsertId
                    ];
                    $resultClass = Model::create('ClassOptionsModel', $classData);
                }

                foreach ($dataSemester as $semester) {
                    $semesterData = [
                        'course_id' => $lastInsertId,
                        'semester_id' => $semester
                    ];
                    $resultSemester = Model::create('SemesterOptionsModel', $semesterData);
                }

                foreach ($dataTeacher as $teacher) {
                    $teacherData = [
                        'course_id' => $lastInsertId,
                        'teacher_id' => $teacher
                    ];
                    $resultTeacher = Model::create('TeacherOptionsModel', $teacherData);
                }

                if ($lastInsertId) {
                    Session::flash('lastInsertId', $lastInsertId);
                    Session::flash('msg-success', 'Thêm môn học thành công');
                    http_response_code(200);

                } else {
                    Session::flash('msg-error', 'Thêm môn học thât bại');
                    http_response_code(500);
                }

            }
        } else {
            Session::flash('msg-error', 'Thêm môn học thât bại');
            http_response_code(500);
        }
    }
}
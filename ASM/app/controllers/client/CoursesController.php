<?php

namespace App\controllers\client;

use Illuminate\framework\Controller;
use Illuminate\framework\Response;
use Illuminate\framework\Request;
use Illuminate\framework\factory\Model;
use App\models\CoursesModel;
use App\models\TeacherOptionsModel;
use App\models\FormsModel;
use App\models\QuestionsModel;

class CoursesController extends Controller
{
    public function index()
    {
        $courses = Model::all('CoursesModel');
        echo $this->view('pages/client/courses', [
            'courses' => $courses
        ]);
    }

    public function detail(Request $request)
    {
        $data = $request->getParams();
        $id = $data['id'];
        $coursesModel = new CoursesModel();
        $course = $coursesModel->getDetailCourse($id);
        $teacherOptionsModel = new TeacherOptionsModel();
        $teachers = $teacherOptionsModel->getName($id);
        $formModel = new FormsModel();
        $form = $formModel->getFormById($id);
        $question = '';
        $classes = '';
        $semesters = '';
        if ($form) {
            $questionModel = new QuestionsModel();
            $question = $questionModel->getQuestionById($form['form_id']);
            $classes = Model::all('ClassesModel');
            $semesters = Model::all('SemestersModel');
        }
        echo $this->view('pages/client/course', [
            'course' => $course,
            'teachers' => $teachers,
            'form' => $form,
            'questions' => $question,
            'classes' => $classes,
            'semesters' => $semesters
        ]);
    }
}
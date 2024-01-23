<?php

namespace App\controllers\admin;

use Illuminate\framework\Controller;
use Illuminate\framework\Response;
use Illuminate\framework\Request;
use Illuminate\framework\factory\Model;
use Illuminate\framework\base\Validator;
use Dompdf\Dompdf;
use Dompdf\Options;

class FeedBackController extends Controller
{
    public function index()
    {

        $this->setLayout('admin');

        echo $this->view('pages/admin/add-form', [
            ''
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
                || Validator::required($request->getData()['class'])
                || Validator::required($request->getData()['subject'])
                || Validator::required($request->getData()['course'])
                || Validator::required($request->getData()['answerType'])
                || Validator::required($request->getData()['evaluationQuestion'])
            ) {
                $_SESSION['create-form'] = 'Thêm đánh giá thât bại - Còn trường chưa điền vào';
            } elseif (
                !Validator::minLength($request->getData()['title'], 5)
            ) {
                $_SESSION['create-form'] = 'Thêm đánh giá thất bại - Tiêu đề quá ngắn (tối thiểu 5 ký tự)';
            } elseif (
                !Validator::minLength($request->getData()['evaluationQuestion'], 10)
            ) {
                $_SESSION['create-form'] = 'Thêm đánh giá thất bại - Câu hỏi đánh giá quá ngắn (tối thiểu 10 ký tự)';
            }
            $this->setLayout('admin');

            echo $this->view('pages/admin/add-form', [
                ''
            ]);
        }
        unset($_SESSION['create-form']);
        $this->setLayout('admin');

        echo $this->view('pages/admin/add-form', [
            ''
        ]);
    }
}

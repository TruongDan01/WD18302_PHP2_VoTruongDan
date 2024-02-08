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
class SemestersController extends Controller
{
    public $response;
    public function __construct()
    {
    }
    public function store(Request $request)
    {
        if ($request->isPost()) {
            if (
                Validator::required($request->getData()['name'])
            ) {
                $_SESSION['msg'] = 'Thêm khóa học thât bại - Còn trường chưa điền vào';
            } elseif (
                !Validator::minLength($request->getData()['name'], 1)
            ) {
                $_SESSION['msg'] = 'Thêm khóa học thất bại - tên quá ngắn (tối thiểu 5 ký tự)';
            } else {  
                $dataForm = $request->getData();
               
                $lastInsertId = Model::create('SemestersModel', $dataForm);
                if ($lastInsertId) {
                    $_SESSION['msg'] = 'Thêm khóa học thành công';
                } else {
                    $_SESSION['msg'] = 'Thêm khóa học thât bại';
                }
            }
                $response = new Response();
                $response->redirect('/admin/feedback/new');
        }

        unset($_SESSION['msg']);
        $response = new Response();
        $response->redirect('/admin/feedback/new');  
    }
}
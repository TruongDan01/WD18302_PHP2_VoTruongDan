<?php

namespace App\controllers\admin;

use Illuminate\framework\Controller;
use Illuminate\framework\Response;
use Illuminate\framework\Request;
use Illuminate\framework\factory\Model;
use Illuminate\framework\base\Validator;
use Dompdf\Dompdf;
use Dompdf\Options;


class TeachersController extends Controller
{
    public function index()
    {   
        $teachers = Model::all('TeachersModel', 'DESC');
        $this->setLayout('admin');
        
        echo $this->view('pages/admin/list-teachers', [
            'teachers' => $teachers
        ]);
    }

    public function store(Request $request)
    {
        if ($request->isPost()) {
            if (
                Validator::required($request->getData()['name'])
                || Validator::required($request->getData()['email'])
                || Validator::required($request->getData()['description'])
            ) {
                $_SESSION['create-teacher'] = 'Thêm giảng viên thât bại - Còn trường chưa điền vào';
            } elseif (
                !Validator::minLength($request->getData()['name'], 5)
            ) {
                $_SESSION['create-teacher'] = 'Thêm giảng viên thất bại - tên quá ngắn (tối thiểu 5 ký tự)';
            }
            elseif (
                !Validator::email($request->getData()['email'])
            ) {
                $_SESSION['create-teacher'] = 'Thêm đánh giá thất bại - Email không đúng định dạng';
            } else {
                $dataForm = $request->getData();
               
                $lastInsertId = Model::create('TeachersModel', $dataForm);
                if ($lastInsertId) {
                    $_SESSION['create-teacher'] = 'Thêm giảng viên thành công';
                } else {
                    $_SESSION['create-teacher'] = 'Thêm giảng viên thât bại';
                }
            }

            
            $this->index();
           
        }

        unset($_SESSION['create-teacher']);
        
        $this->index();
    }

    public function destroy(Request $request)
    {
        if ($request->isPost()) {
            $teacherId = $request->getParam();

            $rowCount = Model::softDelete('TeachersModel', $teacherId);

            if ($rowCount > 0) {

                $_SESSION['delete-teacher'] = 'Xóa sản phẩm thành công';

                $this->index();
            }
        }
    }
}
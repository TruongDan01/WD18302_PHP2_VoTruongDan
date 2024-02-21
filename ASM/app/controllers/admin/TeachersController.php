<?php

namespace App\controllers\admin;

use Illuminate\framework\Controller;
use Illuminate\framework\Response;
use Illuminate\framework\Request;
use Illuminate\framework\factory\Model;
use Illuminate\framework\base\Validator;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\framework\Session;

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
            $error = false;

            if (Validator::required($request->getData()['name'])) {
                Session::flash('error-name', 'Vui lòng điền Email');
                $error = true;
            } elseif (!Validator::minLength($request->getData()['name'], 5)) {
                Session::flash('error-name', 'Tên quá ngắn (tối thiểu 5 ký tự)');
                $error = true;
            }

            if (Validator::required($request->getData()['email'])) {
                Session::flash('error-name', 'Vui lòng điền Email');
                $error = true;
            } else if (!Validator::email($request->getData()['email'])) {
                Session::flash('error-email', 'Email không đúng định dạng');
                $error = true;
            }
            if (Validator::required($request->getData()['description'])) {
                Session::flash('error-name', 'Vui lòng điền mô tả');
                $error = true;
            }

            if ($error) {
                Session::flash('msg-error', 'Cập nhật thất bạn');
                Response::redirect('/admin/teacher/new');
            } else {
                $dataForm = $request->getData();

                $lastInsertId = Model::create('TeachersModel', $dataForm);
                if ($lastInsertId) {
                    Session::flash('msg-success', 'Thêm giảng viên thành công');
                } else {
                    Session::flash('msg-errot', 'Thêm giảng viên thất bại');
                }
            }

            $this->index();

        }
        $this->index();
    }

    public function destroy(Request $request)
    {
        if ($request->isPost()) {
            $teacherId = $request->getParam();

            $rowCount = Model::softDelete('TeachersModel', $teacherId);

            if ($rowCount > 0) {

                Session::flash('msg-success', 'Xóa thành công');

                $this->index();
            }
        }
    }

    public function update(Request $request)
    {
        if ($request->isPost()) {
            $id = $request->getParams()['id'];
            $error = false;

            if (Validator::required($request->getData()['name'])) {
                Session::flash('error-name', 'Vui lòng điền Email');
                $error = true;
            } elseif (!Validator::minLength($request->getData()['name'], 5)) {
                Session::flash('error-name', 'Tên quá ngắn (tối thiểu 5 ký tự)');
                $error = true;
            }

            if (Validator::required($request->getData()['email'])) {
                Session::flash('error-name', 'Vui lòng điền Email');
                $error = true;
            } else if (!Validator::email($request->getData()['email'])) {
                Session::flash('error-email', 'Email không đúng định dạng');
                $error = true;
            }
            if (Validator::required($request->getData()['description'])) {
                Session::flash('error-name', 'Vui lòng điền mô tả');
                $error = true;
            }

            if ($error) {
                Session::flash('msg-error', 'Cập nhật thất bạn');
                Response::redirect('/admin/teacher/new');
            } else {
                $dataForm = $request->getData();

                $lastInsertId = Model::update('TeachersModel', $id, $dataForm);
                if ($lastInsertId) {
                    Session::flash('msg-success', 'Cập nhật thành công');
                } else {
                    Session::flash('msg-error', 'Cập nhật thất bại');
                }
                Response::redirect('/admin/teacher/new');
            }


            Response::redirect('/admin/teacher/new');

        }
    }
}
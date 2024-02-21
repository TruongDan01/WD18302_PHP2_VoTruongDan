<?php

namespace App\controllers\login;

use Illuminate\framework\Controller;
use Illuminate\framework\Response;
use Illuminate\framework\Request;
use Illuminate\framework\Session;
use Illuminate\framework\factory\Model;
use Illuminate\framework\base\Validator;

class AuthController extends Controller
{
    public function login()
    {
        $this->setLayout('login');
        echo $this->view('pages/login/sign-in', []);
    }

    public function authLogin(Request $request)
    {
        if ($request->isPost()) {
            $data = $request->getData();
            $email = $data['email'];
            $password = $data['password'];
            $error = false;

            if (empty($email)) {
                Session::flash('error_email', 'Vui lòng nhập email!');
                $error = true;
            } elseif (!Validator::email($email)) {
                Session::flash('error_email', 'Email không đúng định dạng!');
                $error = true;
            } elseif (empty(Model::findEmail('UsersModel', $email))) {
                Session::flash('error_email', 'Email không tồn tại!');
                $error = true;
            }

            if (empty($password)) {
                Session::flash('error_password', 'Vui lòng nhập mật khẩu!');
                $error = true;
            }

            if ($error) {
                Response::redirect('/admin/login');
            } else {
                $dataUser = $request->getData();
                $findPassword = Model::findEmail('UsersModel', $request->getData()['email']);

                if (!empty($findPassword) && password_verify($request->getData()['password'], $findPassword['password'])) {
                    if (isset($dataUser['remember'])) {
                        $expire = time() + 86400 * 30; // 30 days
                        setcookie('emailAdmin', $dataUser['email'], $expire, '/');
                    } else {
                        setcookie('emailAdmin', '', time() - 3600);
                    }

                    Session::data('user', $findPassword);
                    Session::flash('msg-success', 'Đăng nhập thành công');
                    if (Session::data('user')['role'] == 2) {
                        Response::redirect('/admin/feedback/new');
                    } else {
                        Response::redirect('/trang-chu');
                    }
                } else {
                    Session::flash('msg-fail', 'Đăng nhập thất bại - Email hoặc mật khẩu không chính xác');
                    Response::redirect('/admin/login');
                }
            }
        }

        $response = new Response();
        $response->redirect('/admin/login');
    }

    public function register(Request $request)
    {
        if ($request->isPost()) {
            $data = $request->getData();
            $name = $data['name'];
            $email = $data['email'];
            $password = $data['password'];
            $confirm_password = $data['confirm-password'];
            $error = false;

            if (empty($name)) {
                Session::flash('error_name', 'Vui lòng nhập tên!');
                $error = true;
            } elseif (!Validator::maxLength($name, 30)) {
                Session::flash('error_name', 'Tên tối đa chỉ được 30 ký tự!');
                $error = true;
            }

            if (empty($email)) {
                Session::flash('error_email', 'Vui lòng nhập email!');
                $error = true;
            } else if (!Validator::email($email)) {
                Session::flash('error_email', 'Email không đúng định dạng!');
                $error = true;
            } else if (!empty(Model::findEmail('UsersModel', $email))) {
                Session::flash('error_email', 'Email đã tồn tại!');
                $error = true;
            }

            if (empty($password)) {
                Session::flash('error_password', 'Vui lòng nhập mật khẩu!');
                $error = true;
            } elseif (!Validator::password($password)) {
                Session::flash('error_password', 'Mật khẩu không đúng định dạng!');
                $error = true;
            }

            if (empty($confirm_password)) {
                Session::flash('error_confirm_password', 'Vui lòng nhập lại mật khẩu!');
                $error = true;
            } elseif (!Validator::equals($password, $confirm_password)) {
                Session::flash('error_confirm_password', 'Mật khẩu nhập lại không khớp!');
                $error = true;
            }
            if ($error) {
                $response = new Response();
                $response->redirect('/admin/register');
            } else {
                $dataForm = $request->getData();

                $hashedPassword = password_hash($request->getData()['password'], PASSWORD_DEFAULT);

                $dataForm['password'] = $hashedPassword;
                unset($dataForm['confirm-password']);

                $lastInsertId = Model::create('UsersModel', $dataForm);

                if ($lastInsertId) {
                    Session::flash('msg-success', 'Đăng ký thành công');
                    $response = new Response();
                    $response->redirect('/admin/login');
                } else {
                    Session::flash('msg-fail', 'Đăng ký thât bại');
                }
            }

            $response = new Response();
            $response->redirect('/admin/register');

        }

        $this->setLayout('login');
        echo $this->view('pages/login/sign-up', [
            ''
        ]);
    }

    public function logOut()
    {
        Session::delete('user');
        $response = new Response();
        $response->redirect('/admin/login');
    }
}
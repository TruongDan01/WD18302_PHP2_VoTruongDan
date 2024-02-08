<?php

namespace App\middlewares;
use Illuminate\framework\Session;
use Illuminate\framework\Response;
use Illuminate\framework\Middlewares;

class AuthMiddleware extends Middlewares
{
    public function handle()
    {

        // Kiểm tra xem user đã đăng nhập chưa
        if (!isset($_COOKIE['emailAdmin'])) {
            if (Session::data('user') == null) {
                $response = new Response();
                $response->redirect('/admin/login');
            }
        }

    }
}

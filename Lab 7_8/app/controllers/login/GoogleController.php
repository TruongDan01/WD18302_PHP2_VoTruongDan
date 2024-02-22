<?php

namespace App\controllers\login;

use Illuminate\framework\Controller;
use Illuminate\framework\Response;
use Illuminate\framework\Request;
use Illuminate\framework\Session;
use Illuminate\framework\factory\Model;
use Illuminate\framework\base\Validator;
use Google\Client;
use Google\Service\Oauth2;

class GoogleController extends Controller
{
    public function login()
    {
        if (isset($_GET['code'])) {

            $code = $_GET['code'];

            $client = new Client();
            $client->setClientId('783078173754-plflf7ldpbkbm4ksno049mb44fgjp602.apps.googleusercontent.com');
            $client->setClientSecret('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');
            $client->setRedirectUri('http://localhost:3000/dang-nhap-google');

            $client->fetchAccessTokenWithAuthCode($code);

            $oauth2Service = new Oauth2($client);
            $userInfo = $oauth2Service->userinfo->get();



            $client->revokeToken($client->getAccessToken());

            $user = Model::findEmail('UsersModel',$userInfo->getEmail());
            if ($user) {
                Session::data('msg', 'Đăng Nhập Thành Công');
                Session::data('user', $user);

                $response = new Response();
                $response->redirect('/');

            } else {
                Session::flash('msg', 'Thông tin đăng nhập không chính xác');
                $response = new Response();
                $response->redirect('dang-nhap');
            }
        } else {
            $client = new Client();
            $client->setClientId('783078173754-plflf7ldpbkbm4ksno049mb44fgjp602.apps.googleusercontent.com');
            $client->setClientSecret('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');
            $client->setRedirectUri('http://localhost:3000/dang-nhap-google');
            $client->addScope('profile');
            $client->addScope('email');


            $authUrl = $client->createAuthUrl();

            // Redirect the user to the Google login page
            header('Location: ' . $authUrl);
            exit;
        }
    }
}
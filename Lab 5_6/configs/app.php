<?php
use App\middlewares\AuthMiddleware;
use Illuminate\framework\Session;


$config['app'] = [
    'routeMiddleware' => [
        '/admin/feedback/new' => AuthMiddleware::class,
        '/' => AuthMiddleware::class,

    ],
    // 'globalMiddleware' => [
    //     ParamsMiddleware::class
    // ],
];
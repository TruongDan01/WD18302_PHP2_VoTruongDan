<?php

namespace Illuminate\framework;

class Application
{
    public Debug $debug;
    public static Application $app;
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public Response $response;
    public Controller $controller;
    public Database $db;
    public Migration $migration;

    public function __construct($rootPath, array $config)
    {
        $this->db = new Database($config['db']);
        self::$app = $this;
        self::$ROOT_DIR = $rootPath;
        $this->migration = new Migration();
        $this->request =  new Request();
        $this->response =  new Response();
        $this->router = new Router($this->request, $this->response);
        
        define('_DIR_ROOT', __DIR__);

        //  Xử lý http root
        if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
            $web_root = 'https://' . $_SERVER['HTTP_HOST'] . '/';
        } else {
            $web_root = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        }

        // $folder = str_replace(strtolower($_SERVER['DOCUMENT_ROOT']), '', strtolower(_DIR_ROOT));
        // $web_root .= $folder;
        define('_WEB_ROOT', $web_root);
    }

    public function getController()
    {
        return $this->controller;
    }

    public function setController(Controller $controller): void
    {
        $this->controller = $controller;
    }

    public function run()
    {
        $this->router->resolve();
    }
}

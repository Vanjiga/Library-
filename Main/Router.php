<?php

namespace app;

use app\DatabaseConnection;

class Router {

    public $getRouter  = [];
    public $postRouter = [];
    public $database;

    public function __construct()
    {
       $this->database =  new DatabaseConnection; 
    }

    public function getMethod($url, $function) {
        $this->getRouter[$url] = $function;
    }

    public function postMethod($url, $function) {
        $this->postRouter[$url] = $function;
    }

    public function resolver() {
        $requestUrl    = $_SERVER['PATH_INFO'] ?? '/';
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        if ($requestMethod === 'GET') {

            $function = $this->getRouter[$requestUrl] ?? null;
        }

        else {

            $function = $this->postRouter[$requestUrl] ?? null;
        }

        
        if ($function) {

            call_user_func($function, $this);
        }

        else {
            echo "Error 404 - The requested page couldn't be found on this web-server.";
        }

    }
    
    public function view($viewDirectory, $parameters = [], $parameters2 = []) {
        foreach ($parameters as $key => $value) {
            $$key = $value;
        }
        foreach ($parameters2 as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include_once __DIR__. "/views/$viewDirectory.php";
        $content = ob_get_clean();
        include_once __DIR__. "/views/__styles.php";     
    }

}
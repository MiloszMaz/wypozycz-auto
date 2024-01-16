<?php

namespace Core;

class Route
{
    public function __construct()
    {
        $routes = require_once '../config/routes.php';

        if(isset($routes['get'])) {
            $this->handleRouteGet($routes['get']);
        }
        if(isset($routes['post'])) {
            $this->handleRoutePost($routes['post']);
        }
    }

    private function handleRouteGet($get): void
    {
        $projectDirectoryUrl = str_replace('\\', '/', __PROJECT_DIR__);
        $projectDirectoryUrl = str_replace($_SERVER['CONTEXT_DOCUMENT_ROOT'], '', $projectDirectoryUrl);
        $projectDirectoryUrl .= '/public';

        $requestUrl = str_replace($projectDirectoryUrl, '', $_SERVER['REQUEST_URI']);

        if(isset($get[$requestUrl])) {
            $class = $get[$requestUrl]['class'];
            $func = $get[$requestUrl]['func'];
            require_once __PROJECT_DIR__.'/Controller/'.$class.'.php';

            $currentController = new $class;
            $currentController->$func();
        }
    }

    private function handleRoutePost($post): void
    {

    }
}
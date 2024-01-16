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
        $projectDirectorySeparatorServer = str_replace('\\', '/', __PROJECT_DIR__);
        $projectDirectoryUrl = str_replace($_SERVER['CONTEXT_DOCUMENT_ROOT'], '', $projectDirectorySeparatorServer);
        $projectDirectoryUrl .= '/public';

        $requestUrl = str_replace($projectDirectoryUrl, '', $_SERVER['REQUEST_URI']);
        $requestUrlPartsWithQuery = explode('?', $requestUrl);
        $requestUrl = $requestUrlPartsWithQuery[0];

        if(isset($get[$requestUrl])) {
            $class = $get[$requestUrl]['class'];
            $func = $get[$requestUrl]['func'];
            require_once __PROJECT_DIR__.'/Controller/'.$class.'.php';

            $classWithNamespace = '\Controller\\'.$class;
            $currentController = new $classWithNamespace;
            $currentController->$func();
        }
    }

    private function handleRoutePost($post): void
    {

    }
}
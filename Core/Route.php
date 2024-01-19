<?php

namespace Core;

class Route
{
    public function __construct()
    {
        $routes = require_once '../config/routes.php';

        if(isset($_GET) && isset($routes['get'])) {
            $this->handleRoute($routes['get']);
        }
        if(isset($_POST) && isset($routes['post'])) {
            $this->handleRoute($routes['post']);
        }
    }

    private function getRequestUrl()
    {
        $serverRoot = $_SERVER['CONTEXT_DOCUMENT_ROOT'] ?? $_SERVER['DOCUMENT_ROOT'];
        $projectDirectorySeparatorServer = str_replace('\\', '/', __PROJECT_DIR__);
        $projectDirectoryUrl = str_replace($serverRoot, '', $projectDirectorySeparatorServer);
        $projectDirectoryUrl .= '/public';

        $requestUrl = str_replace($projectDirectoryUrl, '', $_SERVER['REQUEST_URI']);
        $requestUrlPartsWithQuery = explode('?', $requestUrl);

        return $requestUrlPartsWithQuery[0];
    }

    private function handleRoute($get): void
    {
        $requestUrl = $this->getRequestUrl();

        if(isset($get[$requestUrl])) {
            $class = $get[$requestUrl]['class'];
            $func = $get[$requestUrl]['func'];
            require_once __PROJECT_DIR__.'/Controller/'.$class.'.php';

            $classWithNamespace = '\Controller\\'.$class;
            $currentController = new $classWithNamespace;
            $currentController->$func();
        }
    }
}
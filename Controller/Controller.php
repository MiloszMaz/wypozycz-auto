<?php
namespace Controller;

class Controller
{
    public function view($filePath, $variables = [])
    {
        echo get_called_class();
        /*extract($variables);

        ob_start();

        include __PROJECT_DIR__ . '/views/' $filePath;

        $output = ob_get_clean();
        echo $output;*/
    }
}
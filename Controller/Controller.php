<?php
namespace Controller;

class Controller
{
    public function getControllerName(): string
    {
        $controller = get_called_class();
        $controllerName = str_replace('Controller\\', '', $controller);
        $controllerName = str_replace('Controller', '', $controllerName);

        return strtolower($controllerName);
    }
    public function view(string $filePath, string $title = '', $variables = []): void
    {
        $variables['__path'] = sprintf('%s/views/%s/%s.php', __PROJECT_DIR__, $this->getControllerName(), $filePath);
        $variables['__title'] = $title;

        extract($variables);

        ob_start();

        include __PROJECT_DIR__ . '/views/layout.php';

        $output = ob_get_clean();
        echo $output;
    }
}
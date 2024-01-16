<?php
const __PROJECT_DIR__ = __DIR__;

class Autoloader
{
    public static function register()
    {
        spl_autoload_register(function ($class) {
            $directorySeparator = '/';
            $file = str_replace('\\', $directorySeparator, $class).'.php';
            if (file_exists(__PROJECT_DIR__.'/'.$file)) {
                require $file;
                return true;
            }
            return false;
        });
    }
}
Autoloader::register();
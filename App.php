<?php
require_once 'Autoloader.php';

use Core\Route;

class App
{
    public function __construct()
    {
        new Route();
    }
}
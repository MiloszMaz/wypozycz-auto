<?php
namespace Controller;

use Controller\Controller;

class HomeController extends Controller
{
    public function Index()
    {
        $this->view('index', 'Strona Główna', [

        ]);
    }
}
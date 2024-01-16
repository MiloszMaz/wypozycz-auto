<?php
namespace Controller;

use Controller\Controller;

class HomeController extends Controller
{
    public function Index()
    {
        echo '22222';

        $this->view('index', [

        ]);
    }
}
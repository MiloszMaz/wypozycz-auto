<?php
namespace Controller;

use Controller\Controller;
use Model\Samochod;

class HomeController extends Controller
{
    public function Index()
    {
        $cars = Samochod::findAll();

        $this->view('index', 'Strona Główna', [
            'cars' => $cars
        ]);
    }
}
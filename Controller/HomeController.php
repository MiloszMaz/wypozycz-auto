<?php
namespace Controller;

use Controller\Controller;
use Model\Samochod;

class HomeController extends Controller
{
    public function Index()
    {
        $cars = Samochod::findAllActive();

        $this->view('index', 'Strona Główna', [
            'cars' => $cars
        ]);
    }
}
<?php
namespace Controller;

use Controller\Controller;
use Model\Samochod;

class HomeController extends Controller
{
    public function Index()
    {
        $topMonthCar = Samochod::getTopMonthCar();

        $cars = Samochod::findAllActive();

        $this->view('index', 'Strona Główna', [
            'cars' => $cars,
            'topMonthCar' => $topMonthCar
        ]);
    }
}
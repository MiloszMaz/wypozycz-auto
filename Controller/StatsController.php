<?php
namespace Controller;

use Controller\Controller;
use Model\Samochod;

class StatsController extends Controller
{
    public function index()
    {
        $cars = Samochod::findAllActive();

        $this->view('index', 'Strona Główna', [
            'cars' => $cars
        ]);
    }
}
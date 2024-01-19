<?php
namespace Controller;

use Controller\Controller;
use Model\Samochod;

class StatsController extends Controller
{
    public function index()
    {
        $allMonth = $this->getAllMonth();

        $this->view('index', 'Strona Główna', [
            'allMonth' => $allMonth,
        ]);
    }

    private function getAllMonth(): array
    {
        $stats = [];
        for($i=1; $i <= 12; $i++) {
            $iAdd = ($i < 10) ? '0'.$i : $i;
            $date = date('Y') . "-" . $iAdd;

            $price = Samochod::findStatsOrderByMonthTotalPrice($date);

            $stats[] = [
                'date' => $date,
                'ilosc' => Samochod::findStatsOrderByMonthIlosc($date),
                'price' => $price['cena'] ?? 0.0,
            ];
        }

        return $stats;
    }
}
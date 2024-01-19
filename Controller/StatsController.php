<?php
namespace Controller;

use Controller\Controller;
use Model\Samochod;

class StatsController extends Controller
{
    public function index()
    {
        $allDays = $this->getAllDays();
        $allMonth = $this->getAllMonth();
        $allDaysMarka = $this->getAllDaysByMarka();
        $allMonthKolor = $this->getAllMonthByKolor();

        $this->view('index', 'Statystyki', [
            'allDays' => $allDays,
            'allMonth' => $allMonth,
            'allDaysMarka' => $allDaysMarka,
            'allMonthKolor' => $allMonthKolor
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
                'price' => Samochod::getPrice($price['cena'] ?? 0.0),
            ];
        }

        return $stats;
    }

    private function getLastDayOfMonth()
    {
        $date = new \DateTimeImmutable();
        $date = $date->modify('last day of this month');
        return $date->format('d');
    }

    private function getAllDays(): array
    {
        $lastDay = $this->getLastDayOfMonth();

        $stats = [];
        for($i=1; $i <= $lastDay; $i++) {
            $iAdd = ($i < 10) ? '0'.$i : $i;
            $date = date('Y-m') . "-" . $iAdd;

            $price = Samochod::findStatsOrderByMonthTotalPrice($date);

            $stats[] = [
                'date' => $date,
                'ilosc' => Samochod::findStatsOrderByMonthIlosc($date),
                'price' => Samochod::getPrice($price['cena'] ?? 0.0),
            ];
        }

        return $stats;
    }

    private function getAllDaysByMarka(): array
    {
        $lastDay = $this->getLastDayOfMonth();

        $stats = [];
        for($i=1; $i <= $lastDay; $i++) {
            $iAdd = ($i < 10) ? '0'.$i : $i;
            $date = date('Y-m') . "-" . $iAdd;

            $result = Samochod::findStatsOrderByDateMarka($date);

            foreach ($result as &$item) {
                $item['cena'] = Samochod::getPrice($item['cena'] ?? 0.0);
            }

            $stats[] = [
                'date' => $date,
                'result' => $result,
            ];
        }

        return $stats;
    }

    private function getAllMonthByKolor(): array
    {
        $stats = [];
        for($i=1; $i <= 12; $i++) {
            $iAdd = ($i < 10) ? '0'.$i : $i;
            $date = date('Y') . "-" . $iAdd;

            $result = Samochod::findStatsOrderByDateKolor($date);

            foreach ($result as &$item) {
                $item['cena'] = Samochod::getPrice($item['cena'] ?? 0.0);
            }

            $stats[] = [
                'date' => $date,
                'result' => $result,
            ];
        }

        return $stats;
    }
}
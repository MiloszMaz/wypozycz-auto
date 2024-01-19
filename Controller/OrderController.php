<?php
namespace Controller;

use Controller\Controller;
use Core\DB;
use Core\FlashMessage;
use Core\Request;
use Core\Auth;
use Model\Klienci;
use Model\Samochod;
use Model\User;
use Model\Wypozyczenia;

class OrderController extends Controller
{
    public function create()
    {
        $id = Request::get('id');

        if(!is_numeric($id)) {
            FlashMessage::add('error', 'Nie znaleziono takiego samochodu');

            $this->redirect('/');
        }

        $car = Samochod::findOne($id);

        $this->view('create', 'Złóż zamówienie', [
            'car' => $car
        ]);
    }

    public function createProcess()
    {
        $idCar = Request::get('idCar');

        $data = Request::get('data');
        $iloscDni = Request::get('ilosc_dni');
        $pesel = Request::get('pesel');

        if(!is_numeric($iloscDni)) {
            FlashMessage::add('error', 'Ilość dni musi być liczbą');

            $this->redirect('/zamowienie', ['id' => $idCar]);
        }
        if(!$this->validateDate($data)) {
            FlashMessage::add('error', 'Data jest niepoprawna');

            $this->redirect('/zamowienie', ['id' => $idCar]);
        }
        if(!is_numeric($pesel)) {
            FlashMessage::add('error', 'Pesel musi być liczbą');

            $this->redirect('/zamowienie', ['id' => $idCar]);
        }


        $klientFromDb = Klienci::findByPesel($pesel);

        if(!$klientFromDb) {
            $klient = new Klienci();
            $klient->imie = Request::get('imie');
            $klient->nazwisko = Request::get('nazwisko');
            $klient->pesel = $pesel;
            $klient->save();

            $idKlienta = $klient->id;
        } else {
            $idKlienta = $klientFromDb['id'];
        }

        $wypozyczenie = new Wypozyczenia();
        $wypozyczenie->id_klienta = $idKlienta;
        $wypozyczenie->id_samochodu = $idCar;
        $wypozyczenie->data = $data;
        $wypozyczenie->ilosc_dni = $iloscDni;
        $wypozyczenie->uwagi = Request::get('uwagi');
        $wypozyczenie->save();

        FlashMessage::add('success', 'Zamówienie zostało złożone, proszę czekać na akceptację przez pracownika');

        $this->redirect('/zamowienie', ['id' => $idCar]);
    }

    private function validateDate(string $date): bool
    {
        $pattern = '/^\d{4}-\d{2}-\d{2}$/';

        return preg_match($pattern, $date);
    }
}
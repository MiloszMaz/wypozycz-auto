<?php
namespace Controller;

use Controller\Controller;
use Core\Auth;
use Core\FlashMessage;
use Core\Request;
use Model\Samochod;

class KierownikController extends Controller
{
    public function __construct()
    {
        if(!Auth::isKierownik()) {
            $this->redirect('/');
        }
    }

    public function carList()
    {
        $cars = Samochod::findAll();

        $this->view('carList', 'Lista samochodów', [
            'cars' => $cars
        ]);
    }

    public function addCar()
    {
        $rokProdukcji = Request::get('rok_produkcji');
        $cena = Request::get('cena_za_jeden_dzien');

        if(!is_float($cena) || !is_numeric($rokProdukcji)) {
            FlashMessage::add('error', 'Rok musi zawierać tylko liczby. <br>Cena musi mieć format np. 52.23');

            $this->redirect('/kierownik/lista-samochodow');
        }

        $samochod = new Samochod();
        $samochod->marka = Request::get('marka');
        $samochod->kolor = Request::get('kolor');
        $samochod->numer_rejestracyjny = Request::get('numer_rejestracyjny');
        $samochod->rok_produkcji = $rokProdukcji;
        $samochod->cena_za_jeden_dzien = $cena;

        $samochod->save();

        FlashMessage::add('success', 'Nowy samochód został dodany.');

        $this->redirect('/kierownik/lista-samochodow');
    }

    public function edit()
    {
        $id = Request::get('id');

        if(!is_numeric($id)) {
            FlashMessage::add('error', 'Nie znaleziono takiego samochodu');

            $this->redirect('/kierownik/lista-samochodow');
        }

        $car = Samochod::findOne($id);

        $this->view('carEdit', 'Edytuj samochód', [
            'car' => $car
        ]);
    }

    public function editSave()
    {
        $id = Request::get('id');

        if(!is_numeric($id)) {
            FlashMessage::add('error', 'Nie znaleziono takiego samochodu');

            $this->redirect('/kierownik/lista-samochodow');
        }

        $car = Samochod::findOne($id);

        if(!$car) {
            FlashMessage::add('error', 'Nie znaleziono takiego samochodu');

            $this->redirect('/kierownik/lista-samochodow');
        }

        $toUpdate = [
            'marka' => Request::get('marka'),
            'kolor' => Request::get('kolor'),
            'numer_rejestracyjny' => Request::get('numer_rejestracyjny'),
            'rok_produckji' => Request::get('rok_produkcji'),
            'cena_za_jeden_dzien' => Request::get('cena_za_jeden_dzien'),
        ];

        Samochod::update($car, $toUpdate);

        FlashMessage::add('success', sprintf('Samochód #%s został zmieniony.', $id));

        $this->redirect('/kierownik/lista-samochodow');
    }

    public function delete()
    {
        $idDelete = Request::get('id');

        FlashMessage::add('success', sprintf('Samochód #%s został usunięty', $idDelete));

        Samochod::delete($idDelete);

        $this->redirect('/kierownik/lista-samochodow');
    }
}
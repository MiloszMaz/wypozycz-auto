<?php
namespace Controller;

use Controller\Controller;
use Core\Auth;
use Model\Wypozyczenia;

class PracownikController extends Controller
{
    public function __construct()
    {
        if(!Auth::isPracownik()) {
            $this->redirect('/');
        }
    }

    public function orderList()
    {
        $orders = Wypozyczenia::findAll();

        $this->view('orderList', 'Lista zamówień', [
            'orders' => $orders
        ]);
    }

    public function createProcess()
    {


        $this->view('create', 'Złóż zamówienie');
    }

}
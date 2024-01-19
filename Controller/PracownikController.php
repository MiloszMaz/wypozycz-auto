<?php
namespace Controller;

use Controller\Controller;
use Core\Auth;
use Core\FlashMessage;
use Core\Request;
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

    public function accept()
    {
        $id = Request::get('id');

        Wypozyczenia::setAccept($id);

        FlashMessage::add('success', sprintf('Zamówienie #%s zostało przyjęte', $id));

        $this->redirect('/pracownik/lista-zamowien');
    }

    public function delete()
    {
        $idDelete = Request::get('id');

        FlashMessage::add('success', sprintf('Zamówienie #%s zostało usunięte', $idDelete));

        Wypozyczenia::delete($idDelete);

        $this->redirect('/pracownik/lista-zamowien');
    }
}
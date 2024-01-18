<?php
namespace Controller;

use Controller\Controller;
use Core\DB;
use Core\FlashMessage;
use Core\Request;
use Core\Auth;
use Model\User;

class AdminController extends Controller
{
    public function __construct()
    {
        if(!Auth::isAdministrator()) {
            $this->redirect('/');
        }
    }

    public function addAccount()
    {
        $users = User::findAll();

        $this->view('addAccount', 'Dodaj nowe konto', [
            'users' => $users
        ]);
    }

    public function addAccountProcess()
    {
        $login = Request::get('login');

        if(User::checkIfExists($login)) {
            FlashMessage::add('error', 'Konto już istnieje z takim loginem');

            $this->redirect('/admin/nowe-konto');
        }

        $user = new User;
        $user->login = $login;
        $user->password = Request::get('password');
        $user->role = Request::get('role');
        $user->save();

        FlashMessage::add('success', 'Konto zostało utworzone');

        $this->redirect('/');
    }

    public function deleteAccount()
    {
        $idDelete = Request::get('id');

        if(Auth::getId() == $idDelete) {
            FlashMessage::add('error', 'Jeżeli usuniesz swoje konto to nie zalogujesz się ponownie. Nie można usunąć swojego konta.');

            $this->redirect('/admin/nowe-konto');
        }

        FlashMessage::add('success', sprintf('Konto #%s zostało usunięte', $idDelete));

        User::delete($idDelete);

        $this->redirect('/admin/nowe-konto');
    }
}
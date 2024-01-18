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
    public function addAccount()
    {
        if(!Auth::isAdministrator()) {
            $this->redirect('/');
        }

        $users = User::findAll();

        $this->view('addAccount', 'Dodaj nowe konto', [
            'users' => $users
        ]);
    }

    public function addAccountProcess()
    {
        if(!Auth::isAdministrator()) {
            $this->redirect('/');
        }

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
}
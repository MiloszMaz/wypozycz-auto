<?php
namespace Controller;

use Controller\Controller;
use Core\DB;
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

        $this->view('addAccount', 'Dodaj nowe konto');
    }

    public function addAccountProcess()
    {
        if(!Auth::isAdministrator()) {
            $this->redirect('/');
        }

        $user = new User;
        $user->login = Request::get('login');
        $user->password = Request::get('password');
        $user->role = Request::get('role');
        $user->save();

        //$this->redirect('/');
    }
}
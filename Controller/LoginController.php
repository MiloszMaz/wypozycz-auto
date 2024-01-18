<?php
namespace Controller;

use Controller\Controller;
use Core\DB;
use Core\Request;
use Core\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if(Auth::isLogged()) {
            $this->redirect('/');
        }

        $this->view('index', 'Logowanie');
    }

    public function loginGo()
    {
        if(Auth::isLogged()) {
            $this->redirect('/');
        }

        $login = Request::get('login');
        $password = Request::get('password');

        $user = DB::queryOne("SELECT * FROM user WHERE login = :login", [
            ':login' => $login,
        ]);

        if($user && password_verify($password, $user['password'])) {
            Auth::authorizeUser($user['id'], $user['login'], $user['role']);
        }

        $this->view('index', 'Logowanie');
    }

    public function logout()
    {
        if(!Auth::isLogged()) {
            $this->redirect('/');
        }

        Auth::logout();

        $this->redirect('/');
    }
}
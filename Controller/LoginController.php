<?php
namespace Controller;

use Controller\Controller;
use Core\Request;
use Core\Auth;

class LoginController extends Controller
{
    public function index()
    {
        $this->view('index', 'Logowanie');
    }

    public function loginGo()
    {
        $login = Request::get('login');
        $password = Request::get('password');

        if(password_hash('test123', PASSWORD_BCRYPT, []));

        $this->view('index', 'Logowanie');
    }
}
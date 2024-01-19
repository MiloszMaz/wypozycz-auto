<?php
namespace Controller;

use Controller\Controller;
use Core\DB;
use Core\FlashMessage;
use Core\Request;
use Core\Auth;
use Model\User;

class OrderController extends Controller
{
    public function create()
    {
        $this->view('create', 'Złóż zamówienie');
    }

    public function createProcess()
    {


        $this->view('create', 'Złóż zamówienie');
    }

}
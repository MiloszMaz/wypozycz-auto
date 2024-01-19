<?php
return [
    'get' => [
        '/' => [
            'class' => 'HomeController',
            'func' => 'index',
        ],

        // zamowienia
        '/zamowienie' => [
            'class' => 'OrderController',
            'func' => 'create',
        ],

        // user
        '/login' => [
            'class' => 'LoginController',
            'func' => 'index',
        ],
        '/logout' => [
            'class' => 'LoginController',
            'func' => 'logout',
        ],

        // pracownik
        '/pracownik/lista-zamowien' => [
            'class' => 'PracownikController',
            'func' => 'orderList',
        ],
        '/pracownik/zamowienie/przyjmij' => [
            'class' => 'PracownikController',
            'func' => 'accept',
        ],
        '/pracownik/zamowienie/usun' => [
            'class' => 'PracownikController',
            'func' => 'delete',
        ],

        // kierownik
        '/kierownik/lista-samochodow' => [
            'class' => 'KierownikController',
            'func' => 'carList',
        ],
        '/kierownik/samochod/edycja' => [
            'class' => 'KierownikController',
            'func' => 'edit',
        ],
        '/kierownik/samochod/ukryj' => [
            'class' => 'KierownikController',
            'func' => 'toggle',
        ],


        // admin
        '/admin/nowe-konto' => [
            'class' => 'AdminController',
            'func' => 'addAccount',
        ],
        '/admin/konto/usun' => [
            'class' => 'AdminController',
            'func' => 'deleteAccount',
        ],
    ],
    'post' => [
        // zamowienie
        '/zloz-zamowienie' => [
            'class' => 'OrderController',
            'func' => 'createProcess',
        ],

        // user
        '/login-go' => [
            'class' => 'LoginController',
            'func' => 'loginGo',
        ],

        // kierownik
        '/kierownik/nowy-samochod' => [
            'class' => 'KierownikController',
            'func' => 'addCar',
        ],
        '/kierownik/samochod/zapisz-edycje' => [
            'class' => 'KierownikController',
            'func' => 'editSave',
        ],

        // admin
        '/admin/nowe-konto-dodaj' => [
            'class' => 'AdminController',
            'func' => 'addAccountProcess',
        ],
    ]
];
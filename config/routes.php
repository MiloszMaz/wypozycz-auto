<?php
return [
    'get' => [
        '/' => [
            'class' => 'HomeController',
            'func' => 'index',
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
        '/login-go' => [
            'class' => 'LoginController',
            'func' => 'loginGo',
        ],

        // admin
        '/admin/nowe-konto-dodaj' => [
            'class' => 'AdminController',
            'func' => 'addAccountProcess',
        ],
    ]
];
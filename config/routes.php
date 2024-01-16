<?php
return [
    'get' => [
        '/' => [
            'class' => 'HomeController',
            'func' => 'index',
        ],
        '/login' => [
            'class' => 'LoginController',
            'func' => 'index',
        ],
        '/logout' => [
            'class' => 'LoginController',
            'func' => 'logout',
        ],
    ],
    'post' => [
        '/login-go' => [
            'class' => 'LoginController',
            'func' => 'loginGo',
        ]
    ]
];
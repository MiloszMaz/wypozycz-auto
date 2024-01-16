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
    ],
    'post' => [
        '/login-go' => [
            'class' => 'LoginController',
            'func' => 'loginGo',
        ]
    ]
];
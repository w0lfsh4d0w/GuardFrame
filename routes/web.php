<?php
require_once __DIR__ .'/../app/Controllers/HomeController.php';
require_once __DIR__ .'/../app/Controllers/AboutController.php';
require_once __DIR__ .'/../app/Controllers/AuthController.php';
return [
    '/' => [
        'GET' => [HomeController::class, 'index']
    ],
    '/about' => [
        'GET' => [AboutController::class, 'index']
    ],
    '/register' => [
        'GET'  => [AuthController::class, 'index'],  
        'POST' => [AuthController::class, 'register']
    ]
];
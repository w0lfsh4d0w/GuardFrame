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
        'GET'  => [AuthController::class, 'registerIndex'],  
        'POST' => [AuthController::class, 'register']
    ],
    '/login' => [
        'GET'  => [AuthController::class, 'loginIndex'],  
        'POST' => [AuthController::class, 'login']
    ],
    '/logout' => [
          
        'POST' => [AuthController::class, 'logout']
    ]


];
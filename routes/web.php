<?php
require_once __DIR__ .'/../app/Controllers/HomeController.php';
require_once __DIR__ .'/../app/Controllers/AboutController.php';
return
[
    '/'=> [HomeController::class, 'index' ], 
    '/about'=> [AboutController::class, 'index' ] 
];
<?php
require_once __DIR__ .'/../app/Controllers/HomeController.php';
require_once __DIR__ .'/../app/Controllers/AboutController.php';
return
[
    '/'=> [HomeController::class,'GET','index' ], 
    '/about'=> [AboutController::class,'GET', 'index' ] 
];
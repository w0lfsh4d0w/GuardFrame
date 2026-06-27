<?php
// this an entry point for all pages 
session_start();
require __DIR__ . '/../app/Core/router.php';
$routes = require __DIR__ . '/../routes/web.php';
$url = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
$router = new Router();


foreach ($routes as $path => $methods) {
    foreach ($methods as $routeMethod => $target) {
        $router->add($path, $target[0], $routeMethod, $target[1]);
    }
    // $path   -> يمثل الرابط مثل '/register'
    // $method -> يمثل الطريقة مثل 'GET' أو 'POST'
    // $target -> مصفوفة تحتوي على [Controller, Function] مثل [AuthController::class, 'index']
}
$router->dispatch($url, $method);

<?php
// this an entry point for all pages 
session_start();
require __DIR__.'/../app/Core/router.php';
$routes = require __DIR__.'/../routes/web.php';
$url = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'] ;
$router = new Router ();
foreach($routes as $path=> $target  )
    {
        $router->add($path, $target[0], $target[1], $target[2]);
    }
$router->dispatch($url, $method) ;


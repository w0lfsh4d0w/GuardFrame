<?php

class Router
{
    protected $routes = [];
    public function add($url, $controller, $method, $function)
    {
        $this->routes[] =
            [
                'url' => $url,
                'controller' => $controller,
                'method' => strtoupper($method),
                'function' => $function
            ];
        return $this;
    }

    public function dispatch($url , $method)
    {
        foreach ($this->routes as $route) {
            if ($url === $route['url']&& $method === $route['method']) {
                $controllerName = $route['controller'];
                $instance = new $controllerName();
                $functionName = $route['function'] ;
                $instance->$functionName() ;
                exit;
            }
        }
        require __DIR__ . '/../../404.php';
        exit ;
    }
}

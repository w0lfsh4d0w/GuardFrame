<?php

class Controller 
{
    public function view($viewname, $data = [])
    {
        $data['csrfToken'] = $_SESSION['csrf_token'] ?? '';
        
        extract($data);
        $viewpath = __DIR__.'/../Views/'.$viewname.'.php';
        require $viewpath;
    }
}
<?php

class Controller 
{
    public function view($viewname ,$data =[])
    {
        // this function will extravct them and make them as variables when we need the in the view 
        extract($data);
        $viewpath = __DIR__.'/../Views/'.$viewname. '.php' ;  
        require $viewpath ;
    }
}
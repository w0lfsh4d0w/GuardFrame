<?php

require_once __DIR__ . '/Controller.php' ;

class AboutController extends Controller
{
    public function index ()
    {
        $this->view('home', ['title' => 'About Us.', 'activePage' => 'about']);
    }
}
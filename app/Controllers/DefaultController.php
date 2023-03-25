<?php

namespace App\Controllers;

class DefaultController extends AppController
{
    public function index()
    {
        $this->render('main');
    }

    public function info()
    {
        $this->render('main');
    }

    public function login()
    {
        $this->render('login');
    }

    public function registration()
    {
        $this->render('registration');
    }

    public function error_page()
    {
        $this->render('error_page');
    }
}
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
        $this->render('error_page');
    }

    public function main()
    {
        $this->render('main');
    }

    public function product()
    {
        $this->render('product');
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

    public function logout()
    {
        $this->render('main');
    }
}
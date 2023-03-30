<?php

namespace App\Controllers;

use App\Models\User;

class AfterLoginController extends AppController
{
    protected function checkRoleLocation()
    {
        $user_model = new User();
        $url = "http://$_SERVER[HTTP_HOST]";
        if (array_key_exists('user', $_SESSION)) {
            if ($user_model->getRoleByUserId($_SESSION['user']) != 'admin') {
                header("Location: {$url}/error_page");
            }
        } else {
            header("Location: {$url}/");
        }
    }

    public function admin_page()
    {
        $this->checkRoleLocation();
        $this->render('admin/admin_page');
    }

    public function login()
    {
        $this->checkRoleLocation();
        $this->render('main');
    }

    public function registration()
    {
        $this->checkRoleLocation();
        $this->render('main');
    }

    public function product_in()
    {
        $this->checkRoleLocation();
        $this->render('login_user/product_in');
    }

}
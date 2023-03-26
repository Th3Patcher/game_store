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
                header("Location: {$url}/registration");
            }
        } else {
            header("Location: {$url}/");
        }
    }

    public function admin_page()
    {
      //  $this->checkRoleLocation();
        $this->render('admin_page');
    }
}
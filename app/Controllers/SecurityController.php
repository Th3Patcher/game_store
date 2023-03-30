<?php

namespace App\Controllers;

use App\Services\ErrorCodes;
use App\Models\User;
use App\Controllers\DefaultController;
class SecurityController extends AppController
{
    /**
     * registration
     */
    public function registration_user()
    {
        $user_model = new User();
        $data = $this->PostDataJson();

        if (is_array($this->validation($data))) {

            return $this->returnInfo($this->validation($data));
        }

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            return $this->returnInfo(ErrorCodes::EMAIL_NOT_VALID);
        }

        if ($user_model->checkUnique($data)) {
            return $this->returnInfo(ErrorCodes::EMAIL_PHONE_ALREADY_EXIST);
        }

        if ((strlen($data['password']) < 5 || strlen($data['password']) > 30)) {
            return $this->returnInfo(ErrorCodes::PASSWORD_NOT_VALID);
        }

        if ($data['password'] !== $data['retry_password']) {
            return $this->returnInfo(ErrorCodes::PASSWORD_CONFIRMATION);
        }

        if (!preg_match('/^\+?\d{1,4}?\d{1,3}?\d{7}$/', $data['phone'])) {
            return $this->returnInfo(ErrorCodes::PHONE_NOT_VALID);
        }

        $user = $user_model->createUser($data);

        $_SESSION['user'] = $user;

        return $this->returnInfo(array('page' => 'main'));
    }

    /**
     * login
     */
    public function login_user()
    {
        $user_model = new User();
        $data = $this->PostDataJson();


        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL) |
            !$user_model->getUserByEmail($data['email'])) {
            return $this->returnInfo(ErrorCodes::EMAIL_NOT_EXIST);
        }

        $user = $user_model->getUserByEmail($data['email']);

        if ((hash('sha256', $data['password']) !== $user['password'])) {
            return $this->returnInfo(ErrorCodes::PASSWORD_NOT_CORRECT);
        }

        $_SESSION['user'] = $user['id'];
        
        return $this->returnInfo(array('page' => 'main'));
    }

    public function logout_user()
    {
        $url = "http://$_SERVER[HTTP_HOST]";
        session_destroy();
        header("Location: {$url}/");
    }

    private function validation(array $data)
    {

        $result = [];
        $message = ErrorCodes::REQUEST_FIELD_REQUIRED;

        foreach ($data as $k => $field) {
            if (empty($field)) {
                $result [$k] = false;
            }
        }

        if (!in_array(false, $result)) {
            return true;
        } else {
            $message['message'] = sprintf(ErrorCodes::REQUEST_FIELD_REQUIRED['message'], array_key_first($result));
        }
        return $message;
    }

}
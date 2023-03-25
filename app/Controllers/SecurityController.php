<?php

namespace App\Controllers;

use App\Services\ErrorCodes;
use App\Models\User;

class SecurityController extends AppController
{
    /**
     * registration
     */
    public function registration_user()
    {
        $data = $this->PostDataJson();

        if (is_array($this->validation($data))) {

            return $this->returnInfo($this->validation($data));
        }

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
            return $this->returnInfo(ErrorCodes::EMAIL_NOT_VALID);
        }

        if((strlen($data['password']) < 5 || strlen($data['password']) > 30)){
            return $this->returnInfo(ErrorCodes::PASSWORD_NOT_VALID);
        }

        if($data['password'] != $data['retry_password']){
            return $this->returnInfo(ErrorCodes::PASSWORD_CONFIRMATION);
        }

        $user_model = new User();
        $user = $user_model->createUser($data);
        var_dump($user);
        die();
    }

    /**
     * login
     */
    public function login_user()
    {

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

            $message['message'] = sprintf(ErrorCodes::REQUEST_FIELD_REQUIRED['message'],array_key_first($result));

        }

        return $message;
    }

}
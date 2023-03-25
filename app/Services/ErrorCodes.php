<?php

namespace App\Services;

class ErrorCodes
{
    public const REQUEST_BODY_REQUIRED = [
        'message'=>'Incorrect request body',
        'status'=>401,
        'code'=>1
    ];

    public const REQUEST_FIELD_REQUIRED = [
        'message' => 'Field is %s empty',
        'status'=>401,
        'code'=>2
    ];

    public const EMAIL_NOT_VALID = [
        'message' => 'Email is not valid',
        'status'=>401,
        'code'=>3
    ];
    public const PASSWORD_NOT_VALID = [
        'message' => 'Password must have from 5 to 30 characters and 1 uppercase letter',
        'status'=>401,
        'code'=>4
    ];
    public const PASSWORD_CONFIRMATION = [
        'message' => 'The passwords don\'t match',
        'status'=>401,
        'code'=>5
    ];
}
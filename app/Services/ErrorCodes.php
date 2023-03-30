<?php

namespace App\Services;

class ErrorCodes
{
    public const REQUEST_BODY_REQUIRED = [
        'message' => 'Incorrect request body',
        'status' => 401,
        'code' => 1
    ];

    public const REQUEST_FIELD_REQUIRED = [
        'message' => 'Field %s is empty',
        'status' => 401,
        'code' => 2
    ];

    public const EMAIL_NOT_VALID = [
        'message' => 'The email is invalid',
        'status' => 401,
        'code' => 3
    ];
    public const PASSWORD_NOT_VALID = [
        'message' => 'Password must have from 5 to 30 characters and 1 uppercase letter',
        'status' => 401,
        'code' => 4
    ];
    public const PASSWORD_CONFIRMATION = [
        'message' => 'The passwords don\'t match',
        'status' => 401,
        'code' => 5
    ];
    public const PHONE_NOT_VALID = [
        'message' => 'The phone is invalid',
        'status' => 401,
        'code' => 6
    ];
    public const EMAIL_NOT_EXIST = [
        'message' => 'The email does not exist',
        'status' => 401,
        'code' => 7
    ];
    public const EMAIL_PHONE_ALREADY_EXIST = [
        'message' => 'The email or phone already exists',
        'status' => 401,
        'code' => 8
    ];
    public const PASSWORD_NOT_CORRECT = [
        'message' => 'The password is incorrect',
        'status' => 401,
        'code' => 9
    ];
}
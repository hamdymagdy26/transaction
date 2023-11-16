<?php

namespace App\Services;

use App\Interfaces\AuthInterface;
use App\Models\User;

class AuthService implements AuthInterface
{
    public function login($data)
    {
        $token = auth('api')->attempt($data);

        if (! $token) {
            return false;
        }

        return ['token' => $token, 'user' => auth('api')->user()];
    }

    public function register($data)
    {
        return User::create($data);
    }
}
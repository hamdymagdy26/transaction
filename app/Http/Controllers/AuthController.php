<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\AuthService;

class AuthController extends BaseController
{
    public $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }
    
    public function login(LoginRequest $request)
    {
        $data = $request->validated();

        $user = $this->authService->login($data);

        if (! $user) {
            return $this->_sendResponse(false, self::STATUS_NOT_ACCEPTABLE, __('auth.invalid_username_or_password'));
        }

        return $this->_sendResponse(true, self::STATUS_OKAY, __('auth.logged_in_successfully'), ['token' => $user['token'], 'user' => new UserResource($user['user'])]);
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();

        $user = $this->authService->register($data);

        return $this->_sendResponse(true, self::STATUS_OKAY, __('auth.logged_in_successfully'), ['user' => new UserResource($user)]);
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class AuthRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules(Request $request)
    {
        $method = $request->getMethod();
        $action = $request->route()->getActionMethod();

        if ($method === 'POST') {
            if ($action === 'frontLogin') {
                return [
                    'email' => 'required|email|exists:users,email',
                    'password' => 'required|string'
                ];        
            } elseif ($action === 'frontRegister') {
                return [
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required|string|confirmed|min:6',
                    'name' => 'required|string'
                ];        
            } elseif ($action === 'backLogin') {
                return [
                    'email' => 'required|email|exists:users,email',
                    'password' => 'required|string'
                ];        
            }
        }
    }
}

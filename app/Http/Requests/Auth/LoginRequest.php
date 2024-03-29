<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\BaseFormRequest;

class LoginRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => __('auth.email_is_mandatory'),
            'email.email' => __('auth.email_must_be_a_valid_email'),
            'email.exists' => __('auth.email_does_not_exist_in_our_system'),
            'password.required'     =>  __('auth.password_is_mandatory')
        ];
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ];
    }
}

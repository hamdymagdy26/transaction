<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\BaseFormRequest;
use App\Utility\Roles;
use Illuminate\Validation\Rule;

class RegisterRequest extends BaseFormRequest
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
            'name.required' => __('auth.email_is_mandatory'),
            'name.max' => __('auth.name_must_not_be_greater_than_50_letters'),
            
            'role.required' => __('auth.role_is_mandatory'),
            'role.in' => __('auth.role_is_invalid'),

            'email.required' => __('auth.email_is_mandatory'),
            'email.email' => __('auth.email_must_be_a_valid_email'),
            'email.unique' => __('auth.email_already_exists'),

            'password.required'     =>  __('auth.password_is_mandatory'),
            'password.min'          =>  __('auth.password_must_be_at_least_4_characters'),
            'password.max'          =>  __('auth.password_must_be_at_maximum_6_characters'),
            'password.confirmed' => __('auth.password_and_confirm_password_must_be_the_same'),
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
            'name' => 'required|max:50',
            'role' => ['required', Rule::in(Roles::roles())],
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:4|max:6|confirmed'
        ];
    }
}

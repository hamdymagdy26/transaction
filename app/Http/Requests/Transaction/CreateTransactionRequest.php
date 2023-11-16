<?php

namespace App\Http\Requests\Transaction;

use App\Http\Requests\BaseFormRequest;
use App\Utility\TransactionStatus;
use Illuminate\Validation\Rule;

class CreateTransactionRequest extends BaseFormRequest
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
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|numeric',
            'date_to_pay' => 'required|date|after:today',
            'vat' => 'required|numeric',
            'including_vat' => 'required|boolean'
        ];
    }
}

<?php

namespace App\Http\Requests\Transaction;

use App\Http\Requests\BaseFormRequest;
use App\Utility\TransactionStatus;
use Illuminate\Validation\Rule;

class UpdateTransactionRequest extends BaseFormRequest
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
            'transaction' => 'required|exists:transactions,id',
            'user_id' => 'sometimes|exists:users,id',
            'amount' => 'sometimes|numeric',
            'date_to_pay' => 'sometimes|date|after:today',
            'vat' => 'sometimes|numeric',
            'including_vat' => 'sometimes|boolean'
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'transaction' => $this->route('transaction'),
        ]);
    }
}

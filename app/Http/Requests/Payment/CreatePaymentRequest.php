<?php

namespace App\Http\Requests\Payment;

use App\Http\Requests\BaseFormRequest;
use App\Models\Transaction;
use Illuminate\Validation\Validator;

class CreatePaymentRequest extends BaseFormRequest
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
            'transaction_id' => 'required|exists:transactions,id',
            'amount' => ['required', 'numeric'],
            'paid_on' => 'required|date',
            'details' => 'sometimes|string'
        ];
    }

    public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator) {
            $value = $validator->getData()['amount'];
            $transaction = Transaction::find($this->transaction_id);

            if ($transaction) {
                $amount = $transaction->amount;
                $paid = $transaction->paid;   
                
                if (($value + $paid) > $amount) {
                    $validator->errors()->add('amount', __('payment.paid_amount_exeeds_original_transaction_amount'));
                }
            }
        });
    }

}

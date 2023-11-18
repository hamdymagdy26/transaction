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
            'user_id.required' => __('transaction.user_id_is_mandatory'),
            'user_id.exists' => __('transaction.user_id_is_invalid'),
            'amount.required' => __('transaction.amount_is_mandatory'),
            'date_to_pay.required' => __('transaction.payment_date_is_mandatory'),
            'date_to_pay.date'     =>  __('transaction.date_to_pay_must_be_valid_date')
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
            'date_to_pay' => 'required|date',
            'vat' => 'required|numeric',
            'including_vat' => 'required|boolean'
        ];
    }
}

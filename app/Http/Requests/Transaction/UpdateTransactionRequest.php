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
            'user_id.exists' => __('transaction.user_id_is_invalid'),
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

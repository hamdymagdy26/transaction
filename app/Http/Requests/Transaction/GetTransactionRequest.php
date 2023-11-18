<?php

namespace App\Http\Requests\Transaction;

use App\Http\Requests\BaseFormRequest;
use App\Utility\TransactionStatus;
use Illuminate\Validation\Rule;

class GetTransactionRequest extends BaseFormRequest
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
            'transaction.required' => __('transaction.transaction_is_mandatory'),
            'transaction.exists' => __('transaction.transaction_is_invalid'),
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
            'transaction' => 'required|exists:transactions,id'
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'transaction' => $this->route('transaction'),
        ]);
    }
}

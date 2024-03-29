<?php

namespace App\Http\Requests\Transaction;

use App\Http\Requests\BaseFormRequest;
use App\Utility\TransactionStatus;
use Illuminate\Validation\Rule;

class ListTransactionRequest extends BaseFormRequest
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
            'status.in' => __('transaction.status_is_invalid'),
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
            'limit' => 'sometimes|integer|min:1',
            'user_id' => 'sometimes|exists:users,id',
            'status' => ['sometimes', Rule::in(TransactionStatus::statuses())]
        ];
    }
}

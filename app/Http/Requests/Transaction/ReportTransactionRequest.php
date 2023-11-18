<?php

namespace App\Http\Requests\Transaction;

use App\Http\Requests\BaseFormRequest;
use App\Utility\TransactionStatus;
use Illuminate\Validation\Rule;

class ReportTransactionRequest extends BaseFormRequest
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
            'from.date' => __('report.from_must_be_valid_date'),
            'to.date' => __('report.to_must_be_valid_date'),
            'to.after' => __('report.to_must_be_after_today'),
            'month.between' => __('report.month_must_be_between_1_and_12')
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
            'from' => 'sometimes|date',
            'to' => 'sometimes|date|after:from',
            'month' => ['sometimes', 'between:1,12'],
            'year' => ['sometimes', 'integer'],
        ];
    }
}

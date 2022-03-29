<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'holder_name' => 'required|string',
            'card_number' => 'required|numeric|min:10',
            'expiry_date' => 'required|date_format:Y-m-d|after:today',
            'to' => 'required|exists:users,id',
            'amount' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'to.required' => 'You Must Select The Transaction Receiver'
        ];
    }
}

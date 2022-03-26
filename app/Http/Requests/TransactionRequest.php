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
            'card_number' => 'required|integer|min:16|max:16',
            'expiry_date' => 'required|date_format:Y-m',
            'to' => 'required|exists:users,id'
        ];
    }
}

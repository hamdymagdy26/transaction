<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Response;

class BaseFormRequest extends FormRequest
{

    protected function failedValidation(Validator $validator)
    {
        throw (new ValidationException($validator, response()->json([
            'success' => false,
            'status_code' => 422,
            "message" => __("messages.Invalid_input_data"),
            "errors" => $validator->errors()->all()
        ], Response::HTTP_UNPROCESSABLE_ENTITY)
        ))->errorBag($this->errorBag);
    }
}

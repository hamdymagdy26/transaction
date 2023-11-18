<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Payment\CreatePaymentRequest;
use App\Http\Requests\Payment\ListPaymentRequest;
use App\Http\Resources\PaymentResource;
use App\Services\PaymentService;

class PaymentController extends BaseController
{
    public $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }
    
    public function index(ListPaymentRequest $request)
    {
        $data = $request->validated();
        $payments = $this->paymentService->index($data);
        return $this->_sendResponse(true, self::STATUS_OKAY, __('messages.records_retrieved_successfully'), PaymentResource::collection($payments));
    }

    public function store(CreatePaymentRequest $request)
    {
        $data = $request->validated();
        $payment = $this->paymentService->store($data);
        return $this->_sendResponse(true, self::STATUS_OKAY, __('messages.record_created_successfully'), new PaymentResource($payment));
    }
}

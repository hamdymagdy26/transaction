<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Transaction\CreateTransactionRequest;
use App\Http\Requests\Transaction\GetTransactionRequest;
use App\Http\Requests\Transaction\ListTransactionRequest;
use App\Http\Requests\Transaction\UpdateTransactionRequest;
use App\Http\Resources\TransactionResource;
use App\Services\TransactionService;

class TransactionController extends BaseController
{
    public $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }
    
    public function index(ListTransactionRequest $request)
    {
        $data = $request->validated();
        $transactions = $this->transactionService->index($data);
        return $this->_sendResponse(true, self::STATUS_OKAY, __('transaction.listing_all_transactions'), TransactionResource::collection($transactions));
    }

    public function store(CreateTransactionRequest $request)
    {
        $data = $request->validated();
        $transaction = $this->transactionService->store($data);
        return $this->_sendResponse(true, self::STATUS_OKAY, __('transaction.transaction_created_successfully'), new TransactionResource($transaction));
    }

    public function show(GetTransactionRequest $request, $transaction)
    {
        $data = $request->validated();
        $transaction = $this->transactionService->show($transaction);
        return $this->_sendResponse(true, self::STATUS_OKAY, __('transaction.transaction_created_successfully'), new TransactionResource($transaction));
    }

    public function update($transaction, UpdateTransactionRequest $request)
    {
        $data = $request->validated();
        $transaction = $this->transactionService->update($transaction, $data);
        return $this->_sendResponse(true, self::STATUS_OKAY, __('transaction.transaction_updated_successfully'), new TransactionResource($transaction));
    }
    
    public function destroy(GetTransactionRequest $request, $transaction)
    {
        $data = $request->validated();
        $transaction = $this->transactionService->destroy($transaction);
        return $this->_sendResponse(true, self::STATUS_OKAY, __('transaction.transaction_deleted_successfully'));
    }
}

<?php

namespace App\Services;

use App\Interfaces\PaymentInterface;
use App\Models\Payment;
use App\Models\Transaction;
use App\Utility\TransactionStatus;

class PaymentService implements PaymentInterface
{
    public function index($data)
    {
        $payments = Payment::query();

        return $payments->paginate($data['limit'] ?? 10);
    }

    public function store($data)
    {
        $payment = Payment::create($data);

        $transaction = Transaction::find($data['transaction_id']);

        $transaction->increment('paid', $data['amount']);

        if ($transaction->paid == $transaction->amount) {
            $transaction->update(['status' => TransactionStatus::PAID]);
        }

        return $payment;
    }
}
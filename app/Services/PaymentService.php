<?php

namespace App\Services;

use App\Interfaces\PaymentInterface;
use App\Models\Payment;

class PaymentService implements PaymentInterface
{
    public function index($data)
    {
        $payments = Payment::query();

        return $payments->paginate($data['limit'] ?? 10);
    }

    public function store($data)
    {
        return Payment::create($data);
    }
}
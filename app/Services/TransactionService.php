<?php

namespace App\Services;

use App\Interfaces\TransactionInterface;
use App\Models\Transaction;

class TransactionService implements TransactionInterface
{
    public function index($data)
    {
        $transactions = Transaction::query();

        if (isset($data['user_id'])) {
            $transactions = $transactions->where('user_id', $data['user_id']);
        }

        if (isset($data['status'])) {
            $transactions = $transactions->where('status', $data['status']);
        }

        return $transactions->paginate($data['limit'] ?? 10);
    }

    public function store($data)
    {
        return Transaction::create($data);
    }

    public function show($id)
    {
        
    }

    public function update($id, $data)
    {
        
    }

    public function destroy($id)
    {
        
    }
}
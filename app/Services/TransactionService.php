<?php

namespace App\Services;

use App\Interfaces\TransactionInterface;
use App\Models\Transaction;
use App\Traits\TransactionMethods;
use App\Utility\TransactionStatus;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TransactionService implements TransactionInterface
{
    use TransactionMethods;
    
    public function index($data)
    {
        $transactions = Transaction::query();

        if (isset($data['user_id'])) {
            $transactions = $transactions->where('user_id', $data['user_id']);
        }

        if (isset($data['status'])) {
            $transactions = $transactions->where('status', $data['status']);
        }

        $this->updateStatus();

        return $transactions->paginate($data['limit'] ?? 10);
    }

    public function store($data)
    {
        $data['status'] = $this->status($data['date_to_pay']);
        return Transaction::create($data);
    }

    public function show($transaction)
    {
        $this->updateStatus($transaction);
        return Transaction::findOrFail($transaction);   
    }

    public function update($transaction, $data)
    {
        $information = Transaction::find($transaction);
        $information->update($data);
        return $information;
    }

    public function destroy($transaction)
    {
        Transaction::where('id', $transaction)->delete();
    }

    public function myTransactions()
    {
        $transactions = Transaction::where('user_id', Auth::id());

        if (isset($data['status'])) {
            $transactions = $transactions->where('status', $data['status']);
        }

        $this->updateStatus();

        return $transactions->paginate($data['limit'] ?? 10);
    }

    public function report($data)
    {
        $transactions = Transaction::query();

        if (isset($data['month'])) {
            $transactions = $transactions->whereMonth('created_at', $data['month']);
        }

        if (isset($data['year'])) {
            $transactions = $transactions->whereYear('created_at', $data['year']);
        }

        if (isset($data['from'])  && isset($data['to'])) {
            $transactions = $transactions->whereBetween('created_at', [$data['from'], $data['to']]);
        }

        return $transactions->get();
    }
}
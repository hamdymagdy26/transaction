<?php

namespace App\Services;

use App\Interfaces\TransactionInterface;
use App\Models\Transaction;
use App\Utility\TransactionStatus;
use Carbon\Carbon;

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

    public static function status($dateToPay)
    {
        switch ($dateToPay) {
            case $dateToPay < Carbon::today():
                return TransactionStatus::OVERDUE;
                break;

            case $dateToPay > Carbon::today():
                return TransactionStatus::OUTSTANDING;
                break;
        }
    }

    public static function updateStatus($id = null)
    {
        $transaction = Transaction::where('date_to_pay', '<', Carbon::today())->where('status', TransactionStatus::OUTSTANDING);
        if ($id) {
            $transaction->where('id', $id)->update(['status' => TransactionStatus::OVERDUE]);
        } else {
            $transaction->update(['status' => TransactionStatus::OVERDUE]);
        }
    }
}
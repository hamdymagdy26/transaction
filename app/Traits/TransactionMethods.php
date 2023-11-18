<?php

namespace App\Traits;

use App\Models\Transaction;
use App\Utility\TransactionStatus;
use Carbon\Carbon;

trait TransactionMethods
{
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
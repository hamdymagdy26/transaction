<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;

class TransactionExport implements FromCollection
{
    public function collection()
    {
        $transactions = Transaction::all();
        $array = [];
        $i = 0;
        foreach ($transactions as $key => $transaction) {
            $array[$key]['from'] = $transaction->sentFrom->name;
            $array[$key]['to'] = $transaction->receivedTo->name;
            $array[$key]['amount'] = $transaction->amount;
            $array[$key]['date'] = \Carbon\Carbon::parse($transaction->created_at)->format("Y-m-d h:i A");
            if ($transaction->status == 1) {
                $array[$key]['status'] = 'Successful';
            } else {
                $array[$key]['status'] = 'Fail';
            }
            $i++;
        }
        $array[$i+1] = ['from', 'to', 'amount', 'date', 'status'];
        $collection = array_reverse($array);
        return collect($collection);
    }
}
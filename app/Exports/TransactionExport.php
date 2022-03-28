<?php

namespace App\Exports;

use App\Invoice;
use App\Models\Transaction;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TransactionExport implements FromView
{
    public function view(): View
    {
        return view('transactions.transactionsExcel', [
            'transactions' => Transaction::all()
        ]);
    }
}
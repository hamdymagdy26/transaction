<?php

namespace App\Http\Controllers;

use App\Exports\TransactionExport;
use App\Exports\TransactionsExport;
use App\Reports\TransactionReport;
use App\Services\Transactions\TransactionServiceInterface;
use Maatwebsite\Excel\Facades\Excel;

class TransactionController extends Controller
{
	private $userServiceInterface;

    public function __construct(TransactionServiceInterface $userServiceInterface) 
    {
    	$this->userServiceInterface = $userServiceInterface;
    }

    public function index()
    {
    	$transactions = $this->userServiceInterface->index();
    	return view('transactions.view')
    		->with("transactions", $transactions);
    }

    public function export()
    {
        return Excel::download(new TransactionExport, 'transactions.xlsx');
    }
}

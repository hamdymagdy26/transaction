<?php 

namespace App\Repositories\Transactions;
use App\Models\Transaction;
use App\Repositories\Transactions\TransactionRepositoryInterface;

class TransactionRepository implements TransactionRepositoryInterface
{
	private $model;

	function __construct(Transaction $model)
	{
		$this->model = $model;
	}

	public function index()
	{
		return $this->model->orderBy('id', 'desc')->paginate(10);
	}
}
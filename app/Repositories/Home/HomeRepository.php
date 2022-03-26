<?php 

namespace App\Repositories\Home;
use App\Models\Transaction;
use App\Repositories\Home\HomeRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class HomeRepository implements HomeRepositoryInterface
{
	private $model;

	function __construct(
        Transaction $model
    )
	{
		$this->model = $model;
	}

	public function storeTransaction($data)
	{
		$insertTransaction = $this->model->create([
            'from' => Auth::id(),
            'to' => $data['to'],
            'amount' => $data['amount']
        ]);

		if (! $insertTransaction) {
			$this->model->where('id', $insertTransaction->id)->update(['status' => 0]);
		}
	}
}
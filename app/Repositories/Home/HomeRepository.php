<?php 

namespace App\Repositories\Home;

use App\Models\Log;
use App\Models\Transaction;
use App\Models\User;
use App\Repositories\Home\HomeRepositoryInterface;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class HomeRepository implements HomeRepositoryInterface
{
	private $model;
	private $userModel;
	private $logModel;

	function __construct(
        Transaction $model,
		User $userModel,
		Log $logModel
    )
	{
		$this->model = $model;
		$this->userModel = $userModel;
		$this->logModel = $logModel;
	}

	public function storeTransaction($data)
	{
		$user = $this->userModel->find(Auth::id());
		$receiver = $this->userModel->find($data['to']);
		
		$transactionHourly = $this->model->where('from', Auth::id())->where('created_at', '>=', \Carbon\Carbon::now()->subHour())->sum('amount');

		if ($user->amount < $data['amount']) {
			throw ValidationException::withMessages(['amount' => 'Your Balance Is Less Than Transaction Amount']);
		}

		if ($transactionHourly > 200 || $transactionHourly + $data['amount'] > 200) {
			throw ValidationException::withMessages(['amount' => 'You Have Exceeded Your Transaction Limit Of 200 L.E.']);
		}

		$transactionData = [
			'from' => Auth::id(),
			'to' => $data['to'],
			'amount' => $data['amount']
		];

		$insertTransaction = $this->model->create($transactionData);
		
		if ($insertTransaction) {
			$this->userModel->where('id', Auth::id())->update(['amount' => $user->amount - $data['amount']]);
			$this->userModel->where('id', $data['to'])->update(['amount' => $receiver->amount + $data['amount']]);
			$this->logModel->create($transactionData);
		} 
		if (! $insertTransaction) {
			$this->model->where('id', $insertTransaction->id)->update(['status' => 0]);
		}
	}

	public function checkout()
	{
		return $this->userModel->all()->except(Auth::id());
	}

	public function myTransaction()
	{
		return $this->model->where('from', Auth::id())->get();
	}

	public function logs()
	{
		return $this->logModel->orderBy('id', 'desc')->get();
	}

	public function frontLogin($data)
	{   
		return auth()->attempt(['email' => $data['email'], 'password' => $data['password']]);
	}

	public function frontRegister($data)
	{
		$userData = Arr::only(
            $data,
            [
                'name',
                'email'
            ]
        );
		$userData['password'] = bcrypt($data['password']);
		$userData['amount'] = 1000;
		return $this->userModel->create($userData);

	}
}
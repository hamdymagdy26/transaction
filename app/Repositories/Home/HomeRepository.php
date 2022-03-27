<?php 

namespace App\Repositories\Home;
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

	function __construct(
        Transaction $model,
		User $userModel
    )
	{
		$this->model = $model;
		$this->userModel = $userModel;
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

		$insertTransaction = $this->model->create([
            'from' => Auth::id(),
            'to' => $data['to'],
            'amount' => $data['amount']
        ]);
		
		if ($insertTransaction) {
			$this->userModel->where('id', Auth::id())->update(['amount' => $user->amount - $data['amount']]);
			$this->userModel->where('id', $data['to'])->update(['amount' => $receiver->amount + $data['amount']]);
		} 
		if (! $insertTransaction) {
			$this->model->where('id', $insertTransaction->id)->update(['status' => 0]);
		}
	}

	public function checkout()
	{
		return $this->userModel->all()->except(Auth::id());
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
<?php 

namespace App\Repositories\Home;
use App\Models\Transaction;
use App\Models\User;
use App\Repositories\Home\HomeRepositoryInterface;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

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
		$insertTransaction = $this->model->create([
            'from' => Auth::id(),
            'to' => $data['to'],
            'amount' => $data['amount']
        ]);

		if (! $insertTransaction) {
			$this->model->where('id', $insertTransaction->id)->update(['status' => 0]);
		}
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
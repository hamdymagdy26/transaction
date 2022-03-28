<?php 

namespace App\Repositories\Admin;
use App\Models\Transaction;
use App\Models\User;
use App\Repositories\Admin\AdminRepositoryInterface;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AdminRepository implements AdminRepositoryInterface
{
	public function backLogin($data)
	{   
		return auth()->attempt(['email' => $data['email'], 'password' => $data['password']]);
	}
}
<?php 

namespace App\Repositories\Users;
use App\Models\User;
use App\Repositories\Users\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
	private $model;

	function __construct(User $model)
	{
		$this->model = $model;
	}

	public function index()
	{
		return $this->model->paginate(10);
	}
}
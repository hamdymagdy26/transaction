<?php 

namespace App\Services\Users;
use App\Repositories\Users\UserRepositoryInterface;

class UserService implements UserServiceInterface
{
	
	private $userRepositoryInterface;

	function __construct(UserRepositoryInterface $userRepositoryInterface)
	{
		$this->userRepositoryInterface = $userRepositoryInterface;
	}

	public function index()
	{
		$users = $this->userRepositoryInterface->index();
		return $users;
	}
}
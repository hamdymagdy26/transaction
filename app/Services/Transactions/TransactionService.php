<?php 

namespace App\Services\Transactions;
use App\Repositories\Transactions\TransactionRepositoryInterface;

class TransactionService implements TransactionServiceInterface
{
	
	private $userRepositoryInterface;

	function __construct(TransactionRepositoryInterface $userRepositoryInterface)
	{
		$this->userRepositoryInterface = $userRepositoryInterface;
	}

	public function index()
	{
		$users = $this->userRepositoryInterface->index();
		return $users;
	}
}
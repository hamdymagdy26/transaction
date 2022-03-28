<?php 

namespace App\Services\Home;
use App\Repositories\Home\HomeRepositoryInterface;

class HomeService implements HomeServiceInterface
{
	
	private $homeRepositoryInterface;

	function __construct(HomeRepositoryInterface $homeRepositoryInterface)
	{
		$this->homeRepositoryInterface = $homeRepositoryInterface;
	}

	public function storeTransaction($data)
	{
		$transactions = $this->homeRepositoryInterface->storeTransaction($data);
		return $transactions;
	}

	public function frontLogin($data)
	{
		return $this->homeRepositoryInterface->frontLogin($data);
	}

	public function checkout()
	{
		return $this->homeRepositoryInterface->checkout();
	}

	public function myTransaction()
	{
		return $this->homeRepositoryInterface->myTransaction();
	}

	public function frontRegister($data)
	{
		return $this->homeRepositoryInterface->frontRegister($data);
	}
}
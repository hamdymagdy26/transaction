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
}
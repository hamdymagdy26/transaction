<?php 

namespace App\Services\Admin;
use App\Repositories\Admin\AdminRepositoryInterface;

class AdminService implements AdminServiceInterface
{
	
	private $adminRepositoryInterface;

	function __construct(AdminRepositoryInterface $adminRepositoryInterface)
	{
		$this->adminRepositoryInterface = $adminRepositoryInterface;
	}

	public function backLogin($data)
	{
		return $this->adminRepositoryInterface->backLogin($data);
	}

}
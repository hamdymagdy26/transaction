<?php 

namespace App\Repositories\Home;

interface HomeRepositoryInterface
{
	public function storeTransaction($data);

	public function frontLogin($data);

	public function checkout();

	public function myTransaction();

	public function frontRegister($data);

}
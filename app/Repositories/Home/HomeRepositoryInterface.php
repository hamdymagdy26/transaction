<?php 

namespace App\Repositories\Home;

interface HomeRepositoryInterface
{
	public function storeTransaction($data);

	public function frontLogin($data);

	public function frontRegister($data);
}
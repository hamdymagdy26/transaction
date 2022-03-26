<?php 

namespace App\Services\Home;

interface HomeServiceInterface
{
	public function storeTransaction($data);

	public function frontLogin($data);

	public function frontRegister($data);
}
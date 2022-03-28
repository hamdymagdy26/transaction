<?php 

namespace App\Services\Home;

interface HomeServiceInterface
{
	public function storeTransaction($data);

	public function checkout();

	public function myTransaction();

	public function logs();

	public function frontLogin($data);

	public function frontRegister($data);
}
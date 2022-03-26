<?php

namespace App\Http\Controllers;

use App\Services\Users\UserServiceInterface;

class UserController extends Controller
{
	private $userServiceInterface;

    public function __construct(UserServiceInterface $userServiceInterface) 
    {
    	$this->userServiceInterface = $userServiceInterface;
    }

    public function index()
    {
    	$users = $this->userServiceInterface->index();
    	return view('users.view')
    		->with("users", $users);
    }
}

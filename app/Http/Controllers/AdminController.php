<?php
   
namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\TransactionRequest;
use App\Services\Admin\AdminServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    private $adminServiceInterface;

    public function __construct(AdminServiceInterface $adminServiceInterface) 
    {
    	$this->adminServiceInterface = $adminServiceInterface;
    }

    public function logout()
    {
        Auth::logout();
        return redirect('admin/home');
    }
  
    /**
     * Return client interface.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        return view('charts');
    }

    public function backLogin(AuthRequest $request)
    {
        $user = $this->adminServiceInterface->backLogin($request->validated());
        if (! $user) {
            toastr()->error('Wrong E-mail Or Password.');
			return redirect('login');
		}
    	return redirect('admin/home');
    }
}
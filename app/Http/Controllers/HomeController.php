<?php
   
namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\TransactionRequest;
use App\Services\Home\HomeServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    private $homeServiceInterface;

    public function __construct(HomeServiceInterface $homeServiceInterface) 
    {
    	$this->homeServiceInterface = $homeServiceInterface;
    }

    public function logout()
    {
        Auth::logout();
        return redirect('loginUser');
    }
  
    /**
     * Return client login interface.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function loginUser()
    {
        return view('front');
    }

    /**
     * Login to end user interface.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function frontRegister(AuthRequest $request)
    {
        $user = $this->homeServiceInterface->frontRegister($request->validated());
    	return redirect('loginUser');
    }

    /**
     * Login to end user interface.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function frontLogin(AuthRequest $request)
    {
        $user = $this->homeServiceInterface->frontLogin($request->validated());
        if (! $user) {
            toastr()->error('Wrong E-mail Or Password.');
			return redirect('loginUser');
		}
    	return redirect('checkout');
    }

    /**
     * Return client register interface.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function register()
    {
        return view('register');
    }

    /**
     * Return checkout page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function checkout()
    {
        return view('checkout');
    }

    public function storeTransaction(TransactionRequest $request)
    {
    	$user = $this->homeServiceInterface->storeTransaction($request->validated());
        toastr()->success('Transaction Done Successfully');
    	return redirect()->back();
    }
    
}
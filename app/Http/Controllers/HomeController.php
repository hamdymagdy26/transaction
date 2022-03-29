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
    	return redirect()->route('checkout');
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
        $users = $this->homeServiceInterface->checkout();
        return view('checkout')->with("users", $users);
    }

    /**
     * Store user transaction.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function storeTransaction(TransactionRequest $request)
    {
    	$user = $this->homeServiceInterface->storeTransaction($request->validated());
        toastr()->success('Transaction Done Successfully');
    	return redirect()->back();
    }

    /**
     * Return user transactions page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function myTransaction()
    {
        $transactions = $this->homeServiceInterface->myTransaction();
        return view('my-transactions')->with("transactions", $transactions);
    }

    /**
     * Return system logs.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function logs()
    {
        $logs = $this->homeServiceInterface->logs();
        return view('logs.index')->with("logs", $logs);
    }
}
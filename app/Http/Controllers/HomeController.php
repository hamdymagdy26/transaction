<?php
   
namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Services\Home\HomeServiceInterface;
use Illuminate\Http\Request;
   
class HomeController extends Controller
{
    private $homeServiceInterface;

    public function __construct(HomeServiceInterface $homeServiceInterface) 
    {
    	$this->homeServiceInterface = $homeServiceInterface;
        $this->middleware('auth');
    }
  
    /**
     * Return client interface.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        return view('home');
    }
  
    /**
     * Return admin interface.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        return view('app');
    }

    public function createTransaction()
    {
        return view('createTransaction');
    }

    public function storeTransaction(TransactionRequest $request)
    {
    	$this->homeServiceInterface->storeTransaction($request->validated());
        toastr()->success('Transaction Done Successfully');
    	return redirect()->back();
    }
    
}
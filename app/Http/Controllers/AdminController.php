<?php
   
namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Services\Admin\AdminServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
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
        return view('app');
    }
}
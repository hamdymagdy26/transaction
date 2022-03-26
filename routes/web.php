<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('logout', [HomeController::class, 'logout'])->name('logout');

// Admin Routes
Route::group(['middleware' => ['is_admin']], function () {
    Route::get('admin/home', [AdminController::class, 'adminHome'])->name('admin.home');
    // List Users
    Route::get('admin/home/users', [UserController::class, 'index'])->name('users.index');
    // List Transactions
    Route::get('admin/home/transactions', [TransactionController::class, 'index'])->name('transactions.index');
});  

// End User Routes
Route::get('loginUser', [HomeController::class, 'loginUser'])->name('loginUser');
Route::get('register', [HomeController::class, 'register'])->name('register');
Route::post('front/login', [HomeController::class, 'frontLogin'])->name('front.login');
Route::post('front/register', [HomeController::class, 'frontRegister'])->name('front.register');
Route::get('checkout', [HomeController::class, 'checkout'])->name('checkout');


<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransactionController;
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

// Admin Routes
Route::middleware(['is_admin'])->group(function () {
    // Admin Panel
    Route::get('admin/home', [AdminController::class, 'adminHome'])->name('admin.home');
    // List Users
    Route::get('admin/home/users', [UserController::class, 'index'])->name('users.index');
    // List Transactions
    Route::get('admin/home/transactions', [TransactionController::class, 'index'])->name('transactions.index');
    Route::get('transactions/export/', [TransactionController::class, 'export'])->name('transactions.export');
    // Logout
    Route::post('logoutAdmin', [AdminController::class, 'logout'])->name('logoutAdmin');
    // Logs
    Route::get('logs/', [HomeController::class, 'logs'])->name('logs');
});  

// End User Routes

Route::get('loginUser', [HomeController::class, 'loginUser'])->name('loginUser');
Route::get('register', [HomeController::class, 'register'])->name('register');
Route::post('front/login', [HomeController::class, 'frontLogin'])->name('front.login');
Route::post('front/register', [HomeController::class, 'frontRegister'])->name('front.register');

Route::middleware(['is_user'])->group(function () {
    // Logout
    Route::post('logoutFront', [HomeController::class, 'logout'])->name('logoutFront');
    Route::get('checkout', [HomeController::class, 'checkout'])->name('checkout');
    Route::post('storeTransaction', [HomeController::class, 'storeTransaction'])->name('storeTransaction');
    Route::get('myTransaction', [HomeController::class, 'myTransaction'])->name('myTransaction');
});
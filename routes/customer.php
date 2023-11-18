<?php

use App\Http\Controllers\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Customer Routes

Route::get('my_transactions', [TransactionController::class, 'myTransactions']);
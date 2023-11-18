<?php

use App\Http\Controllers\TransactionController;
use App\Http\Controllers\PaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Admin Routes

Route::apiResource('transaction', TransactionController::class);
Route::apiResource('payment', PaymentController::class);
Route::get('report', [TransactionController::class, 'report']);
<?php

use App\Http\Controllers\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Admin Routes

Route::apiResource('transaction', TransactionController::class);
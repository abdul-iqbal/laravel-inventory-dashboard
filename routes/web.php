<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/api/products');
Route::apiResource('api/products', ProductController::class)->only(['index', 'store', 'show', 'update']);

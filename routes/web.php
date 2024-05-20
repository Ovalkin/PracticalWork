<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/signup', [UserController::class, 'signup']);
Route::post('/signin', [UserController::class, 'signin']);
Route::get('/signout', [UserController::class, 'signout']);

Route::post('/orders/make', [UserController::class, 'makeOrder']);

Route::get('/admin-panel/{page?}', [AdminController::class, 'index']);
Route::post('/admin-panel/orders/submit', [AdminController::class, 'submitUserOrder']);

Route::get('/{page?}', [UserController::class, 'index']);

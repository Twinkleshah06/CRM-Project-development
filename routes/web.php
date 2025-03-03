<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BDEController;
use App\Http\Controllers\CustomerController;

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('role:admin');
    Route::get('/bde/dashboard', [BDEController::class, 'dashboard'])->name('bde.dashboard')->middleware('role:bde');
    Route::get('/customer/dashboard', [CustomerController::class, 'dashboard'])->name('customers.dashboard')->middleware('role:customer');

    // Route::get('/customer/create', [CustomerController::class, 'create'])->name('customers.store')->middleware('role:admin');

    Route::resource('customers', CustomerController::class)->middleware('role:admin');
    Route::resource('bdes', BDEController::class)->middleware('role:admin');

    Route::resource('customers', CustomerController::class)->middleware('role:customer');
    Route::resource('bdes', BDEController::class)->middleware('role:customer');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('customers', CustomerController::class);
});

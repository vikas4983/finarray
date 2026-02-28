<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/', [AuthenticationController::class, 'login'])->name('/');
Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('books', BookController::class);
    Route::resource('borrows', BorrowController::class);
});
Route::middleware(['auth'])->group(function () {
    Route::get('borrows', [BorrowController::class, 'index'])
        ->name('borrows.index')
        ->middleware('role:admin|member');
});

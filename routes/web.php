<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BusinessProfileController;
use App\Http\Controllers\AuthController;

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return 'Welcome, ' . auth()->user()->name . ' (' . auth()->user()->role . ')';
})->middleware('auth')->name('dashboard');

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return view('welcome');
})->name('welcome');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/tourist-feed', [DashboardController::class, 'touristFeed'])->name('tourist.feed');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/business/create', [BusinessProfileController::class, 'create'])->name('business.create');
    Route::post('/business/store', [BusinessProfileController::class, 'store'])->name('business.store');
});
<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\SupervisorController;
use Illuminate\Support\Facades\Route;

/// ============
/// Auth Routes
/// ============

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::get('/admin', [AuthController::class, 'admin'])->name(('admin'));
Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::post('/register', [AuthController::class, 'registerUser'])->name('registerUser');
Route::post('/admin', [AuthController::class, 'loginAdmin'])->name(('loginAdmin'));
Route::post('/login', [AuthController::class, 'loginUser'])->name('loginUser');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/// ============
/// Guest Routes
/// ============
Route::middleware(['auth', 'role:guest'])->group(function (){
   Route::get('/guest', [GuestController::class, 'dashboard'])->name('guestDashboard');
   Route::get('/guest/create', [GuestController::class, 'createReservation'])->name('createReservation');
   Route::get('/guest/history', [GuestController::class, 'history'])->name('guestHistory');
   Route::get('/guest/show/{reservation}', [GuestController::class, 'showReservation'])->name('showReservation');

   Route::post('/guest/store', [GuestController::class, 'storeReservation'])->name('storeReservation');
});


/// =================
/// Supervisor Routes
/// =================

Route::middleware(['auth', 'role:supervisor'])->group(function (){
    Route::get('/supervisor', [SupervisorController::class, 'dashboard'])->name('supervisorDashboard');
    Route::get('/supervisor/reservations/{reservation}', [SupervisorController::class, 'listReservations'])->name('listReservations');

    Route::patch(('/supervisor/reservations/{reservation}/status'), [SupervisorController::class, 'statusReservation'])->name('statusReservation');
});


/// =============
/// Admin Routes
/// =============
Route::middleware(['auth', 'role:admin'])->group(function (){
    Route::get('/adminPage', [AdminController::class,'dashboard'])->name('adminDashboard');
});

/// =============
/// Multi Role Routes
/// =============
Route::middleware(['auth', 'role:admin,supervisor'])->group(function (){
    Route::get('/details/{reservation}', [SupervisorController::class, 'detailReservation'])->name('detailReservation');
});
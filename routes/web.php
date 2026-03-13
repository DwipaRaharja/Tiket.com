<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
// ADMIN
require __DIR__ . '/admin/sidebar.php';
require __DIR__ . '/admin/manage_bus.php';
require __DIR__ . '/admin/manage_user.php';
require __DIR__ . '/admin/manage_jadwal.php';
require __DIR__ . '/admin/manage_pemesanan.php';
require __DIR__ . '/user/menu.php';
require __DIR__ . '/user/home.php';
require __DIR__ . '/user/pemesanan.php';

Route::get('/admin/dashboard', [DashboardController::class, 'index']);
Route::post('/admin/bus/cek-data', [BusController::class, 'cekData'])->name('bus.cekData');
Route::post('/admin/user/cek-data', [UserController::class, 'cekData'])->name('user.cekData');

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/hash', function () {
    return Hash::make('1234');
});

Route::get('/', function () {
    return view('auth.login');
});
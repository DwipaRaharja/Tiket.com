<?php

use App\Http\Controllers\BusController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
// ADMIN
require __DIR__ . '/admin/sidebar.php';
require __DIR__ . '/admin/manage_bus.php';
require __DIR__ . '/admin/manage_user.php';
require __DIR__ . '/admin/manage_jadwal.php';
require __DIR__ . '/admin/manage_pemesanan.php';

Route::get('/', function () {
    return view('admin.dashboard.index');
});
Route::post('/admin/bus/cek-data', [BusController::class, 'cekData'])->name('bus.cekData');
Route::post('/admin/user/cek-data', [UserController::class, 'cekData'])->name('user.cekData');
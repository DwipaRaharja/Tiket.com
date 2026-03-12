<?php

use App\Http\Controllers\BusController;
use Illuminate\Support\Facades\Route;
// ADMIN
require __DIR__ . '/admin/sidebar.php';
require __DIR__ . '/admin/manage_bus.php';
require __DIR__ . '/admin/manage_users.php';
require __DIR__ . '/admin/manage_jadwal.php';

Route::get('/', function () {
    return view('admin.dashboard.index');
});
Route::post('/admin/bus/cek-data', [BusController::class, 'cekData'])->name('bus.cekData');
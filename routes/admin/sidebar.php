<?php

use App\Http\Controllers\BusController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard.index');
});
Route::get('/admin/manage-bus', [BusController::class, 'index']);
Route::get('/admin/manage-users', [UsersController::class, 'index']);
Route::get('/admin/manage-jadwal', [JadwalController::class, 'index']);

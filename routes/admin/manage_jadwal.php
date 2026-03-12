<?php

use App\Http\Controllers\JadwalController;
use Illuminate\Support\Facades\Route;

Route::resource('jadwal', JadwalController::class);
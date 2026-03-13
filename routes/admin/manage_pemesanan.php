<?php

use App\Http\Controllers\PemesananController;
use Illuminate\Support\Facades\Route;

Route::resource('pemesanan', PemesananController::class);
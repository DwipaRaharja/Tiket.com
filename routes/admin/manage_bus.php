<?php

use App\Http\Controllers\BusController;
use Illuminate\Support\Facades\Route;

Route::resource('bus', BusController::class);
<?php
use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
return view('user.home');
});

Route::get('/jadwal-saya', function () {
return view('user.jadwal-saya');
});

Route::get('/contact', function () {
return view('user.contact');
});

Route::get('/detail-tiket', function () {
return view('user.detail-tiket');
});

Route::get('/pembayaraan', function () {
return view('user.pembayaraan');
});

Route::get('/contact', function () {
return view('user.contact');
});

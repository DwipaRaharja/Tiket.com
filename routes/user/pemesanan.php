<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PemesananController;

Route::get('/jadwal-saya', [PemesananController::class, 'jadwalSaya']);

Route::get('/detail-tiket/{id}', [PemesananController::class, 'detailPemesananUser']);

Route::get('/pembayaran/{id}', [PemesananController::class, 'pembayaranPemesananUser']);
Route::post('/pembayaran/{id}', [PemesananController::class, 'konfirmasiBayar']);
Route::post('/pemesanan', [PemesananController::class, 'storeUser'])->name('pemesanan.store');

Route::delete('/pemesanan/{id}', [PemesananController::class, 'destroy']);

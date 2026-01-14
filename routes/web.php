<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\KasController;
use App\Http\Controllers\LaporanController;

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/warga/cetak', [WargaController::class, 'cetak'])->name('warga.cetak'); 
    Route::resource('warga', WargaController::class);

    Route::resource('kas', KasController::class);

    Route::get('/laporan/cetak', [LaporanController::class, 'cetak'])->name('laporan.cetak');
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');

});

Route::get('/', function () {
   return redirect()->route('login');
});
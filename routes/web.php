<?php

use App\Http\Controllers\Penjualan\PembayaranController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Marketing\MarketingController;
use App\Http\Controllers\Penjualan\PenjualanController;
use App\Http\Controllers\KomisiPenjualan\KomisiPenjualanController;

Route::redirect('/', '/komisi-penjualan');

Route::get('/komisi-penjualan', KomisiPenjualanController::class)->name('komisi-penjualan.index');

Route::controller(MarketingController::class)->prefix('marketing')->as('marketing.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/', 'store')->name('store');
    Route::put('/{marketing}', 'update')->name('update');
    Route::delete('/{marketing}', 'destroy')->name('destroy');
});

Route::get('/penjualan', PenjualanController::class)->name('penjualan.index');
Route::get('/penjualan/{penjualan}/pembayaran', [PembayaranController::class, 'index'])->name('penjualan.pembayaran.index');
Route::post('/penjualan/{penjualan}/pembayaran', [PembayaranController::class, 'store'])->name('penjualan.pembayaran.store');


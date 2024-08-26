<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Marketing\MarketingController;
use App\Http\Controllers\Penjualan\PenjualanController;
use App\Http\Controllers\KomisiPenjualan\KomisiPenjualanController;

Route::redirect('/', '/komisi-penjualan');

Route::get('komisi-penjualan', KomisiPenjualanController::class)->name('komisi-penjualan.index');

Route::get('marketing', [MarketingController::class, 'index'])->name('marketing.index');
Route::post('marketing', [MarketingController::class, 'store'])->name('marketing.store');

Route::get('penjualan', PenjualanController::class)->name('penjualan.index');


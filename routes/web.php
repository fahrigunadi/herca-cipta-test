<?php

use App\Http\Controllers\Penjualan\PenjualanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Marketing\MarketingController;

Route::redirect('/', '/marketing');

Route::get('marketing', [MarketingController::class, 'index'])->name('marketing.index');
Route::post('marketing', [MarketingController::class, 'store'])->name('marketing.store');

Route::get('penjualan', PenjualanController::class)->name('penjualan.index');

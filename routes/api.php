<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Marketing\MarketingController;
use App\Http\Controllers\API\Penjualan\PenjualanController;
use App\Http\Controllers\API\Penjualan\PembayaranController;
use App\Http\Controllers\API\KomisiPenjualan\KomisiPenjualanController;

Route::prefix('v1')->group(function () {
    Route::get('/komisi-penjualan', KomisiPenjualanController::class);

    Route::apiResource('marketing', MarketingController::class);

    Route::get('/penjualan', PenjualanController::class);

    Route::get('/penjualan/{penjualan}/pembayaran', [PembayaranController::class, 'index']);
    Route::post('/penjualan/{penjualan}/pembayaran', [PembayaranController::class, 'store']);
});

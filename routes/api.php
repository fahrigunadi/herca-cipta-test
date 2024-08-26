<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\KomisiPenjualan\KomisiPenjualanController;

Route::prefix('v1')->group(function () {
    Route::get('/komisi-penjualan', KomisiPenjualanController::class);
});

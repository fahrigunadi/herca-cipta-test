<?php

namespace App\Http\Controllers\KomisiPenjualan;

use Inertia\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Penjualan\PenjualanService;

class KomisiPenjualanController extends Controller
{
    public function __construct(
        protected PenjualanService $service,
    ) {}

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): Response
    {
        return inertia('KomisiPenjualan/Index', $this->service->dataKomisiPenjualan());
    }
}

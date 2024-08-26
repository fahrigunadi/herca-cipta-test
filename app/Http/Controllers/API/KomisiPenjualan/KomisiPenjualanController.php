<?php

namespace App\Http\Controllers\API\KomisiPenjualan;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
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
    public function __invoke(Request $request): JsonResponse
    {
        return response()->json([
            'data' => $this->service->dataKomisiPenjualan(),
        ]);
    }
}

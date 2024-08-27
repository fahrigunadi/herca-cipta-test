<?php

namespace App\Http\Controllers\API\Penjualan;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Services\Penjualan\PenjualanService;

class PenjualanController extends Controller
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
            'message' => 'success',
            'data' => $this->service->dataIndex($request->search),
        ]);
    }
}

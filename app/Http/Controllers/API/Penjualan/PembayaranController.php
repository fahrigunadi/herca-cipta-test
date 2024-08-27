<?php

namespace App\Http\Controllers\API\Penjualan;

use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Services\Penjualan\PenjualanService;
use App\Http\Requests\Penjualan\StorePembayaranPenjualanRequest;

class PembayaranController extends Controller
{
    public function __construct(
        protected PenjualanService $service,
    ) {}

    /**
     * Handle the incoming request.
     */
    public function index(Request $request, Penjualan $penjualan): JsonResponse
    {
        return response()->json([
            'message' => 'success',
            'data' => $this->service->dataIndexPembayaran($penjualan),
        ]);
    }

    /**
     * Handle the incoming request.
     */
    public function store(StorePembayaranPenjualanRequest $request, Penjualan $penjualan): JsonResponse
    {
        $remainingBalance = is_null($penjualan->pembayaran->last()?->remaining_balance) ? $penjualan->grand_total : $penjualan->pembayaran->last()?->remaining_balance;

        if ($remainingBalance <= 0) {
            return response()->json([
                'message' => 'Pembayaran telah lunas',
            ], 422);
        }

        $pembayaran = $this->service->storePembayaran($penjualan, (int) $request->amount_paid);

        return response()->json([
            'message' => 'success',
            'data' => [
                'pembayaran' => $pembayaran,
            ],
        ]);
    }
}

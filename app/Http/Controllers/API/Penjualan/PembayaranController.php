<?php

namespace App\Http\Controllers\API\Penjualan;

use App\Http\Requests\Penjualan\StorePembayaranPenjualanRequest;
use App\Models\Marketing;
use App\Models\Penjualan;
use App\Services\Penjualan\PenjualanService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PembayaranController extends Controller
{
    public function __construct(
        protected PenjualanService $service,
    ) {}

    /**
     * Handle the incoming request.
     */
    public function index(Request $request, Penjualan $penjualan)
    {
        return response()->json([
            'message' => 'success',
            'data' => $this->service->dataIndexPembayaran($penjualan),
        ]);
    }

    /**
     * Handle the incoming request.
     */
    public function store(StorePembayaranPenjualanRequest $request, Penjualan $penjualan)
    {
        \DB::enableQueryLog();

        $remainingBalance = is_null($penjualan->pembayaran->last()?->remaining_balance) ? $penjualan->grand_total : $penjualan->pembayaran->last()?->remaining_balance;

        if ($remainingBalance <= 0) {
            return response()->json([
                'message' => 'Pembayaran telah lunas',
            ], 422);
        }

        $pembayaran = $this->service->storePembayaran($penjualan, (int) $request->amount_paid);

        logger(\DB::getQueryLog());
        return response()->json([
            'message' => 'success',
            'data' => [
                'pembayaran' => $pembayaran,
            ],
        ]);
    }
}

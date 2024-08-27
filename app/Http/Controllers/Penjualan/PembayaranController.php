<?php

namespace App\Http\Controllers\Penjualan;

use Inertia\Response;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
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
    public function index(Request $request, Penjualan $penjualan): Response
    {
        return inertia('Penjualan/Pembayaran/Index', $this->service->dataIndexPembayaran($penjualan));
    }

    public function store(StorePembayaranPenjualanRequest $request, Penjualan $penjualan): RedirectResponse
    {
        $this->service->storePembayaran($penjualan, $request->amount_paid);

        return to_route('penjualan.pembayaran.index', $penjualan);
    }
}

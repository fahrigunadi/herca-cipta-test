<?php

namespace App\Http\Controllers\Penjualan;

use Inertia\Response;
use Illuminate\Http\Request;
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
    public function __invoke(Request $request): Response
    {
        return inertia('Penjualan/Index', $this->service->dataIndex($request->search));
    }
}

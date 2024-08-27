<?php

namespace App\Http\Controllers\API\Marketing;

use App\Http\Requests\Marketing\StoreMarketingRequest;
use App\Http\Requests\Marketing\UpdateMarketingRequest;
use App\Models\Marketing;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Services\Marketing\MarketingService;

class MarketingController extends Controller
{
    public function __construct(
        protected MarketingService $service
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        return response()->json([
            'message' => 'success',
            'data' => $this->service->dataIndex($request->search)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMarketingRequest $request): JsonResponse
    {
        $marketing = $this->service->store($request->validated());

        return response()->json([
            'message' => 'success',
            'data' => [
                'marketing' => $marketing,
            ],
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Marketing $marketing): JsonResponse
    {
        return response()->json([
            'message' => 'success',
            'data' => [
                'marketing' => $marketing,
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMarketingRequest $request, Marketing $marketing): JsonResponse
    {
        $this->service->update($marketing, $request->validated());

        return response()->json([
            'message' => 'success',
            'data' => [
                'marketing' => $marketing->refresh(),
            ],
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Marketing $marketing): JsonResponse
    {
        $this->service->destroy($marketing);

        return response()->json([
            'message' => 'success',
        ]);
    }
}

<?php

namespace App\Http\Controllers\Marketing;

use App\Http\Requests\Marketing\StoreMarketingRequest;
use App\Models\Marketing;
use App\Services\Marketing\MarketingService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Inertia\Response;

class MarketingController extends Controller
{
    public function __construct(
        protected MarketingService $service,
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): Response
    {
        return inertia('Marketing/Index', $this->service->dataIndex($request->search));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMarketingRequest $request)
    {
        $this->service->store($request->validated());

        return to_route('marketing.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Marketing $marketing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Marketing $marketing)
    {
        //
    }
}

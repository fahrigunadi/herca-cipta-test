<?php

namespace App\Http\Controllers\Marketing;

use App\Http\Requests\Marketing\StoreMarketingRequest;
use App\Http\Requests\Marketing\UpdateMarketingRequest;
use App\Models\Marketing;
use App\Services\Marketing\MarketingService;
use Illuminate\Http\RedirectResponse;
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
    public function store(StoreMarketingRequest $request): RedirectResponse
    {
        $this->service->store($request->validated());

        return to_route('marketing.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMarketingRequest $request, Marketing $marketing): RedirectResponse
    {
        $this->service->update($marketing, $request->validated());

        return to_route('marketing.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Marketing $marketing): RedirectResponse
    {
        $this->service->destroy($marketing);

        return to_route('marketing.index');
    }
}

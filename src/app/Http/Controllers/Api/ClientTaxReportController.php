<?php

namespace App\Http\Controllers\Api;

use App\Filters\ClientTaxReportFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClientTaxReport\StorePostRequest;
use App\Http\Requests\ClientTaxReport\UpdatePostRequest;
use App\Http\Resources\ClientTaxReport\ClientTaxReportResource;
use App\Models\ClientTaxReport;
use App\Mutations\BaseSort;
use Illuminate\Http\Request;

class ClientTaxReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = ClientTaxReport::query();
        // apply filters
        $query = (new ClientTaxReportFilter($request))->apply($query);
        // sort
        $query = (new BaseSort($request, 'client_tax_reports'))->apply($query);
        // paginate
        $perPage = $request->input('limit', 15);
        return ClientTaxReportResource::collection($query->paginate($perPage));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $ctr = ClientTaxReport::create($request->validated());
        return new ClientTaxReportResource($ctr);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ctr = ClientTaxReport::findOrFail($id);
        return new ClientTaxReportResource($ctr);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, string $id)
    {
        $ctr = ClientTaxReport::findOrFail($id);
        $ctr->update($request->validated());
        return new ClientTaxReportResource($ctr);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ctr = ClientTaxReport::findOrFail($id);
        $ctr->delete();
        return response()->noContent();
    }
}

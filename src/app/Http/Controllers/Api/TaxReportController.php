<?php

namespace App\Http\Controllers\Api;

use App\Filters\TaxReportFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\TaxReport\StorePostRequest;
use App\Http\Requests\TaxReport\UpdatePostRequest;
use App\Http\Resources\TaxReport\TaxReportResource;
use App\Models\TaxReport;
use App\Mutations\BaseSort;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class TaxReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = TaxReport::query();
        // apply filters
        $query = (new TaxReportFilter($request))->apply($query);

        // sort
        $query = (new BaseSort($request, 'tax_reports'))->apply($query);

        // paginate
        $perPage = $request->input('limit', 15);
        return TaxReportResource::collection($query->paginate($perPage));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $taxReport = TaxReport::create($request->validated());
        return new TaxReportResource($taxReport);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $taxReport = TaxReport::findOrFail($id);
        return new TaxReportResource($taxReport);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, string $id)
    {
        $taxReport = TaxReport::findOrFail($id);
        $taxReport->update($request->validated());
        return new TaxReportResource($taxReport);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $taxReport = TaxReport::findOrFail($id);
        $taxReport->delete();
        return response()->noContent();
    }
}

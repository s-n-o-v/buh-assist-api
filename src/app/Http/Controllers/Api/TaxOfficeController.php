<?php

namespace App\Http\Controllers\Api;

use App\Filters\TaxOfficeFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\TaxOffice\StorePostRequest;
use App\Http\Requests\TaxOffice\UpdatePostRequest;
use App\Http\Resources\TaxOffice\TaxOfficeResource;
use App\Models\TaxOffice;
use App\Mutations\BaseSort;
use Illuminate\Http\Request;

class TaxOfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = TaxOffice::query();
        // apply filters
        $query = (new TaxOfficeFilter($request))->apply($query);
        // sort
        $query = (new BaseSort($request, 'tax_offices'))->apply($query);
        // paginate
        $perPage = $request->input('limit', 15);
        return TaxOfficeResource::collection($query->paginate($perPage));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $taxOffice = TaxOffice::create($request->validated());
        return new TaxOfficeResource($taxOffice);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $taxOffice = TaxOffice::findOrFail($id);
        return new TaxOfficeResource($taxOffice);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, string $id)
    {
        $taxOffice = TaxOffice::findOrFail($id);
        $taxOffice->update($request->validated());
        return new TaxOfficeResource($taxOffice);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $taxOffice = TaxOffice::findOrFail($id);
        $taxOffice->delete();
        return response()->noContent();
    }
}

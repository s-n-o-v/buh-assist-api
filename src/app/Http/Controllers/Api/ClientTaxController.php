<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClientTax\ClientTaxResource;
use App\Models\ClientTax;
use App\Mutations\BaseSort;
use Illuminate\Http\Request;

class ClientTaxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = ClientTax::query();
        // apply filters
        if ($value = $request->input('filter.client_id')) {
            $query->where('client_id', '=', $value);
        }
        if ($value = $request->input('filter.tax_report_id')) {
            $query->where('tax_report_id', '=', $value);
        }

        // sort
        $query = (new BaseSort($request, 'client_taxes'))->apply($query);

        // paginate
        $perPage = $request->input('limit', 15);
        return ClientTaxResource::collection($query->paginate($perPage));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'client_id' => 'required',
            'tax_report_id' => 'required',
        ]);
        $ct = ClientTax::create($data);
        return new ClientTaxResource($ct);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ct = ClientTax::findOrFail($id);
        return new ClientTaxResource($ct);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'client_id' => 'required',
            'tax_report_id' => 'required',
        ]);

        $ct = ClientTax::findOrFail($id);
        $ct->update($data);
        return new ClientTaxResource($ct);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ct = ClientTax::findOrFail($id);
        $ct->delete();
        return response()->noContent();
    }
}

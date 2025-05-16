<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrganizationResource;
use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return OrganizationResource::collection(Organization::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);

        $org = Organization::create($data);
        return new OrganizationResource($org);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $org = Organization::findOrFail($id);
        return new OrganizationResource($org);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);

        $org = Organization::findOrFail($id);
        $org->update($data);

        return new OrganizationResource($org);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $org = Organization::findOrFail($id);
        $org->delete();
        return response()->noContent();
    }
}

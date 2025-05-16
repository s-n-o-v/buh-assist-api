<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CertResource;
use App\Models\Cert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CertController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CertResource::collection(Cert::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'client_id' => 'required|numeric|exists:clients,id',
            'valid_to' => 'required|date',
        ]);

        $cert = Cert::create($data);
        return new CertResource($cert);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cert = Cert::findOrFail($id);
        return new CertResource($cert);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'client_id' => 'sometimes|required|numeric|exists:clients,id',
            'valid_to' => 'nullable|date',
        ]);

        $cert = Cert::findOrFail($id);
        $cert->update($data);

        return new CertResource($cert);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cert = Cert::findOrFail($id);
        try {
            $cert->delete();
            return response()->noContent();
        } catch (\Throwable $th) {
            return response()->response(['message' => $th->getMessage()], 500);
        }
//        return response()->response(['message' => 'Сертификат не найден'], 404);
    }
}

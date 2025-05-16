<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Client\ClientResource;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
//        Log::debug(__METHOD__ . ' > data: ЛОГ');
        return ClientResource::collection(Client::with('tags')->get());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'nullable|email',
            // остальные поля
        ]);

        $client = Client::create($data);

        return new ClientResource($client);
    }

    public function show(Client $client)
    {
        return new ClientResource($client);
    }

    public function update(Request $request, Client $client)
    {
        $data = $request->validate([
            'name' => 'sometimes|required|string',
            'email' => 'nullable|email',
        ]);

        $client->update($data);

        return new ClientResource($client);
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return response()->noContent();
    }

}


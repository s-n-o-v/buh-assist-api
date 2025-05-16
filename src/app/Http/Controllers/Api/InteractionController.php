<?php

namespace App\Http\Controllers\Api;

use App\Filters\InteractionFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Interaction\StorePostRequest;
use App\Http\Requests\Interaction\UpdatePostRequest;
use App\Http\Resources\Interaction\InteractionResource;
use App\Models\Interaction;
use App\Mutations\BaseSort;
use Illuminate\Http\Request;

class InteractionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Interaction::query();
        // apply filters
        $query = (new InteractionFilter($request))->apply($query);
        // sort
        $query = (new BaseSort($request, 'interactions'))->apply($query);
        // paginate
        $perPage = $request->input('limit', 15);
        return InteractionResource::collection($query->paginate($perPage));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $action = Interaction::create($request->validated());
        return new InteractionResource($action);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $action = Interaction::findOrFail($id);
        return new InteractionResource($action);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, string $id)
    {
        $action = Interaction::findOrFail($id);
        $action->update($request->validated());
        return new InteractionResource($action);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $action = Interaction::findOrFail($id);
        $action->delete();
        return response()->noContent();
    }
}

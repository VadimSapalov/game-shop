<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SoftwareResource;
use App\Models\Software;
use Illuminate\Http\Request;

class SoftwareController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $softwares = Software::all();
        return SoftwareResource::collection($softwares);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'Title' => 'required|string|max:255',
            'Description' => 'required|min:10',
            'Price' => 'required|numeric|min:0.01',
            'ReleaseDate' => 'required|date',

        ]);

        $item = Software::create($validated);

        return response()->json([
            'message' => 'Success',
            'data' => $item
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Software $software)
    {
        return new SoftwareResource($software);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Software $software)
    {
        $validated = $request->validate([
            'Title' => 'sometimes|string|max:255',
            'Description' => 'sometimes|min:10',
            'Price' => 'sometimes|numeric|min:0.01',
            'ReleaseDate' => 'sometimes|date',

        ]);

        $software->update($validated);

        return response()->json([
            'message' => 'Update success',
            'data' => $software
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Software $software)
    {
        $software->delete();

        return response()->json([
            'message' => 'Deletion complete'
        ], 204);
    }
}

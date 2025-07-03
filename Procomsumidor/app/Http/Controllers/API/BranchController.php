<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branch;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Branch::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'provider_id' => 'required|integer',
            'contact_name' => 'required|string|max:255',
            'contact_phone_number' => 'required|string|max:50',
            'contact_position' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
        ]);

        $branch = Branch::create($request->all());

        return response()->json($branch, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $branch = Branch::find($id);
        if (!$branch) {
            return response()->json(['message' => 'Branch not found'], 404);
        }
        return response()->json($branch);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $branch = Branch::find($id);
        if (!$branch) {
            return response()->json(['message' => 'Branch not found'], 404);
        }

        $request->validate([
            'provider_id' => 'sometimes|required|integer',
            'contact_name' => 'sometimes|required|string|max:255',
            'contact_phone_number' => 'sometimes|required|string|max:50',
            'contact_position' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
        ]);

        $branch->update($request->all());

        return response()->json($branch);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $branch = Branch::find($id);
        if (!$branch) {
            return response()->json(['message' => 'Branch not found'], 404);
        }

        $branch->delete();

        return response()->json(null, 204);
    }
}

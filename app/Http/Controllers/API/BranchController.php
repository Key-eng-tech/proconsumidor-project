<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branch;

class BranchController extends Controller
{ 
    public function index()
    { 
        $branches = Branch::all();
        return response()->json($branches);
    }

    public function store(Request $request)
    {
        // Validar los datos recibidos
        $validatedData = $request->validate([
            'provider_id' => 'required|integer',
            'contact_name' => 'required|string|max:255',
            'contact_phone_number' => 'required|string|max:50',
            'contact_position' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
        ]);

        // Crear la nueva sucursal
        $branch = Branch::create($validatedData);

        // Devolver la sucursal creada con código HTTP 201
        return response()->json($branch, 201);
    }
}

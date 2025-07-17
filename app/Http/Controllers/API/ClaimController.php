<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Claim;
use Illuminate\Http\Request;

class ClaimController extends Controller
{
    // GET /api/claims
    public function index()
    {
        $claims = Claim::all();
        return response()->json($claims);
    }

    // POST /api/claims
    public function store(Request $request)
    {
        // Validación de los datos
        $validated = $request->validate([
            'employee_profile_id' => 'required|exists:profiles,id',
            'entry_way_id' => 'required|exists:entry_ways,id',
            'motive_id' => 'required|exists:motives,id',
            'product_type_id' => 'required|exists:product_types,id',
            'claim_status_id' => 'required|exists:claim_statuses,id',
            'creator_profile_id' => 'required|exists:profiles,id',
            'consumer_id' => 'required|exists:consumers,id',
            'provider_id' => 'required|exists:providers,id',
            'contract_number' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'claim_id_external' => 'nullable|string|max:255',
            'description' => 'required|string',
        ]);

        // Crear el reclamo
        $claim = Claim::create($validated);

        // Retornar respuesta JSON
        return response()->json([
            'message' => 'Reclamo creado exitosamente.',
            'data' => $claim
        ], 201);
    }
}

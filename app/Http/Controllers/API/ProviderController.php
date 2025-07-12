<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function index()
    {
        $providers = Provider::all();
        return response()->json($providers);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'id_number' => 'nullable|string|max:100',
            'email' => 'required|email|unique:providers,email',
            'phone_number' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:255',
            'business_sector' => 'nullable|string|max:255',
            'website' => 'nullable|url|max:255',
            'contact_name' => 'nullable|string|max:255',
            'contact_email' => 'nullable|email|max:255',
            'contact_phone_number' => 'nullable|string|max:50',
            'contact_position' => 'nullable|string|max:255',
        ]);

        $provider = Provider::create($validatedData);

        return response()->json($provider, 201);
    }
}

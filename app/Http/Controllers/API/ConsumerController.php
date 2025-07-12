<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Consumer;
use Illuminate\Http\Request;

class ConsumerController extends Controller
{
    public function index()
    {
        return response()->json(Consumer::all());
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:consumers,email',
            'phone' => 'nullable|string|max:20',
        ]);

        $consumer = Consumer::create($validatedData);

        return response()->json($consumer, 201);
    }
}

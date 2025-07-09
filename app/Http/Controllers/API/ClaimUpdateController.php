<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ClaimUpdate;
use Illuminate\Http\Request;

class ClaimUpdateController extends Controller

{
    public function index()
    {
        $ClaimUpdates = ClaimUpdate::all();
        return response()->json($ClaimUpdates);
    }
    
    
}

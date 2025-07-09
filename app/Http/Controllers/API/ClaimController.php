<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Claim;
use Illuminate\Http\Request;

class ClaimController extends Controller

{
    public function index()
    { 
        $claims = Claim::all();
        return response()->json($claims);
    }
}


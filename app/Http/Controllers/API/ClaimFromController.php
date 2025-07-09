<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ClaimFrom;
use Illuminate\Http\Request;

class ClaimFromController extends Controller
{
    public function index()
    {
        $ClaimFroms = ClaimFrom::all();
        return response()->json($ClaimFroms);
    }
}

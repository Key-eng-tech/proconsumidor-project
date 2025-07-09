<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ClaimStatus;
use Illuminate\Http\Request;

class ClaimStatusController extends Controller
{
    public function index()
    {
        $ClaimStatuss = ClaimStatus::all();
        return response()->json($ClaimStatuss);
    }

}

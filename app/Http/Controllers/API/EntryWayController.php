<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\EntryWay;
use Illuminate\Http\Request;

class EntryWayController extends Controller
{
    public function index()
    {
        $EntryWays = EntryWay::all();
        return response()->json($EntryWays);
    }
}

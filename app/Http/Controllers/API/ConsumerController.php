<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Consumer;
use Illuminate\Http\Request;

class ConsumerController extends Controller
{
    public function index()
    {
        $Consumers = Consumer::all();
        return response()->json($Consumers);
    }
}

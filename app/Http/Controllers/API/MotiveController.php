<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Motive;
use Illuminate\Http\Request;

class MotiveController extends Controller
{
   public function index()
   {
        $Motives = Motive::all();
        return response()->json($Motives);
   }
}

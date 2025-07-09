<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    public function index()
   {
        $ProductTypes = ProductType::all();
        return response()->json($ProductTypes);
   }

}

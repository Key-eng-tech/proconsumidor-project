<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   public function index()
   {
    $Users= User::all();
    return response()->json($Users);
   }
   
}

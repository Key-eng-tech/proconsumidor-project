<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
   public function index()
   {
       $Profiles = Profile::all();
       return response()->json($Profiles);
   }
}

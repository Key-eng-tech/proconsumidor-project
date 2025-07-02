<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\BranchController;

Route::middleware('api')->group(function () {
    Route::apiResource('branches', BranchController::class);
});

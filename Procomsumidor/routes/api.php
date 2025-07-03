<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\ProvinceController;
use App\Http\Controllers\API\BranchController;
use App\Http\Controllers\API\ClaimController;
use App\Http\Controllers\API\ClaimFromController;
use App\Http\Controllers\API\ClaimStatusController;
use App\Http\Controllers\API\ClaimUpdateController;
use App\Http\Controllers\API\ConsumerController;
use App\Http\Controllers\API\DepartmentController;
use App\Http\Controllers\API\EntryWayController;
use App\Http\Controllers\API\MotiveController;
use App\Http\Controllers\API\MunicipioController;
use App\Http\Controllers\API\OfficeController;
use App\Http\Controllers\API\ProductTypeController;
use App\Http\Controllers\API\ProfileController;
use App\Http\Controllers\API\ProviderController;
use App\Http\Controllers\API\SectorController;
use App\Http\Controllers\API\UserController;

Route::apiResource("provinces", ProvinceController::class);
Route::apiResource('branches', BranchController::class);
Route::apiResource('claims', ClaimController::class);
Route::apiResource('claims-from', ClaimFromController::class);
Route::apiResource('claim-statuses', ClaimStatusController::class);
Route::apiResource('claim-updates', ClaimUpdateController::class);
Route::apiResource('consumers', ConsumerController::class);
Route::apiResource('departments', DepartmentController::class);
Route::apiResource('entry-ways', EntryWayController::class);
Route::apiResource('motives', MotiveController::class);
Route::apiResource('municipios', MunicipioController::class);
Route::apiResource('offices', OfficeController::class);
Route::apiResource('product-types', ProductTypeController::class);
Route::apiResource('profiles', ProfileController::class);
Route::apiResource('providers', ProviderController::class);
Route::apiResource('sectors', SectorController::class);
Route::apiResource('users', UserController::class);

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResources([
        'branches' => BranchController::class,
        'claims' => ClaimController::class,
        'claims-from' => ClaimFromController::class,
        'claim-statuses' => ClaimStatusController::class,
        'claim-updates' => ClaimUpdateController::class,
        'consumers' => ConsumerController::class,
        'departments' => DepartmentController::class,
        'entry-ways' => EntryWayController::class,
        'motives' => MotiveController::class,
        'municipios' => MunicipioController::class,
        'offices' => OfficeController::class,
        'product-types' => ProductTypeController::class,
        'profiles' => ProfileController::class,
        'providers' => ProviderController::class,
        'sectors' => SectorController::class,
        'users' => UserController::class,
    ]);
});

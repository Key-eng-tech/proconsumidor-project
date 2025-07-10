<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

// Ruta pública para login que devuelve token
Route::post('/login', [LoginController::class, 'login'])->name('login');


$controllers = [
    'users'          => 'UserController',
    'sectors'        => 'SectorController',
    'provinces'      => 'ProvinceController',
    'providers'      => 'ProviderController',
    'profiles'       => 'ProfileController',
    'producttypes'   => 'ProductTypeController',
    'offices'        => 'OfficeController',
    'claimstatuses'  => 'ClaimStatusController',
    'municipios'     => 'MunicipioController',
    'motives'        => 'MotiveController',
    'entryways'      => 'EntryWayController',
    'departments'    => 'DepartmentController',
    'consumers'      => 'ConsumerController',
    'claimupdates'   => 'ClaimUpdateController',
    'claimfroms'     => 'ClaimFromController',
    'claims'         => 'ClaimController',
    'branches'       => 'BranchController',
    'rols'           => 'RolController',
];

Route::middleware('auth:sanctum')->group(function () use ($controllers) {

    foreach ($controllers as $routeName => $controller) {
        $controllerClass = "App\\Http\\Controllers\\API\\{$controller}";

        if (class_exists($controllerClass)) {
            Route::resource($routeName, $controllerClass)->except(['create', 'edit']);
        } else {
            logger("Controlador {$controllerClass} no encontrado.");
        }
    }

});

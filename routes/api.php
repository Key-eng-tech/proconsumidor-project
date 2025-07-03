<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;


$models = ['User', 'Product', 'Sector', 'Province', 'Provider', 'Profile', 'ProductType', 'Office',
           'Municipio', 'Motive', 'EntryWay', 'Department', 'Consumer', 'ClaimUpdate', 'ClaimStatus', 'ClaimFrom', 'Claim', 'Branch']; // Lista de modelos 

Route::middleware('auth:sanctum')->group(function () use 
($models) {  

foreach ($models as $model) {
    $controller = "App\\Http\\Controllers\API\{$model}Controller";
    if (class_exists($controller)){
        $routeName = strtolower(Str::plural($model));
        Route::resource($routeName, $controller)->except(['create', 'edit']);

    } else {

         logger("Controlador {$controller} no encontrado.");
    }

    // Verifica si el controlador existe antes de definir una ruta
    Route::resource($routeName, $controller);
}

});

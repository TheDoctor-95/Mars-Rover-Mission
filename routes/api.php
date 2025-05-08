<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObstacleController;
use App\Http\Controllers\PlanetController;
use App\Http\Controllers\RoverController;
use App\Http\Controllers\MovementController;

Route::group(["prefix" => "api"],function (){

        Route::get("planet/", [PlanetController::class, "getPlanet"]);
        Route::get("planet/{planet_id}/rover/", [RoverController::class, "getRover"]);

        Route::get("planet/{planet_id}/obstacle/", [ObstacleController::class, "getAllObstacles"]);
        Route::get("planet/{planet_id}/rover/{rover_id}/movement", [MovementController::class, "getMovements"]);
        Route::post("planet/{planet_id}/rover/{rover_id}/movement", [MovementController::class, "executeCommand"]);

});

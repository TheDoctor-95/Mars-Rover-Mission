<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObstacleController;

Route::group(["prefix" => "api"],function (){

    Route::group(["prefix" => "planet"], function () {

        Route::group(["prefix" => "{id}/obstacle"], function () {
            Route::get("/", [ObstacleController::class, "getAllObstacles"]);
        });

    });


});

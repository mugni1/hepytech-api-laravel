<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PortfolioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login/auth', [AuthController::class,'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/logout', [AuthController::class,'logout']);

    //Portfolio
    // list
    Route::get('/portfolio', [PortfolioController::class,'index']);
    // create
    Route::post('/portfolio/store', [PortfolioController::class,'store']);
    // udapte
    Route::put('/portfolio/{id}/update',[PortfolioController::class,'update']);
});
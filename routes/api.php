<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PortfolioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login/auth', [AuthController::class,'login']);

// list portfolio
Route::get('/portfolio', [PortfolioController::class,'index']);

// list news
Route::get('/news',[NewsController::class,'index']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/logout', [AuthController::class,'logout']);

    // PORTFOLIO
    // create
    Route::post('/portfolio/store', [PortfolioController::class,'store']);
    // udapte
    Route::put('/portfolio/{id}/update',[PortfolioController::class,'update']);
    // delete
    Route::delete('/portfolio/{id}/delete',[PortfolioController::class,'delete']);

    // NEWS
    // show
    Route::get('/news/{id}/detail', [NewsController::class,'show']);
    // create
    Route::post('/news/create',[NewsController::class,'create']);
    // update
    Route::put('/news/{id}/update', [NewsController::class,'update']);
    // delete
    Route::delete('/news/{id}/delete', [NewsController::class,'delete']);

    // CATEGORI
    //show
     Route::get('/categori', [CategoriController::class,'index']);
});
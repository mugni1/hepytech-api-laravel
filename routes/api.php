<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriController;
use App\Http\Controllers\ContacController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\TrustedController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login/auth', [AuthController::class,'login']);

// HOME 
Route::get('/home', [HomeController::class,'index']);

// ABOUT
Route::get('/about', [AboutController::class,'index']);

// TRUSTED
// trusted list
Route::get('/trusted', [TrustedController::class,'index']);

// CONTAC
Route::get('/contac', [ContacController::class,'index']);

// list portfolio
Route::get('/portfolio', [PortfolioController::class,'index']);

// list news
Route::get('/news',[NewsController::class,'index']);

Route::middleware(['auth:sanctum'])->group(function () {
    //logout
    Route::get('/logout', [AuthController::class,'logout']);
    
    // HOME
    //update
    Route::put('/home/{id}/update',[HomeController::class,'update']);

    // ABOUT
    // update 
    Route::put('/about/{id}/update', [AboutController::class,'update']);

    // CONTAC
    //update
    Route::put('/contac/{id}/update', [ContacController::class,'update']);

    // TRUSTED
    // trusted create
    Route::post('/trusted/create', [TrustedController::class,'store']);
    // trusted update 
    Route::put('/trusted/{id}/update', [TrustedController::class,'update']);
    // trusted delete
    Route::delete('/trusted/{id}/delete', [TrustedController::class, 'delete']);
    


    // PORTFOLIO
    // show
    Route::get("/portfolio/{id}/detail", [PortfolioController::class,'show']);
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
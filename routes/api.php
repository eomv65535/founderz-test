<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestauranteController;

Route::get('/', [RestauranteController::class,'index']);
Route::get('/update-list', [RestauranteController::class,'updateList']);
Route::get('/get/{id}', [RestauranteController::class,'show']);

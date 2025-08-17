<?php

use App\Http\Controllers\Web\MainController;
use Illuminate\Support\Facades\Route;
Route::get('home',[MainController::class,'home']);
Route::get('details',[MainController::class,'details']);
Route::get('contact',[MainController::class,'contact']);
Route::post('contact',[MainController::class,'post']);

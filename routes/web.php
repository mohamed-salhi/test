<?php

use App\Http\Controllers\Web\MainController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
Route::get('home',[MainController::class,'home'])->name('home');
Route::get('details/{id}',[MainController::class,'details'])->name('details');
Route::get('contact',[MainController::class,'contact'])->name('contact');
Route::post('contact',[MainController::class,'post'])->name('contact');


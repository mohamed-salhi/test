<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return "hallow word";
});
Route::get('/page', function () {
    return "page";
});
Route::get('/about', function () {
    return "about us";
});
Route::get('page2',function (){
   return "page2";
});

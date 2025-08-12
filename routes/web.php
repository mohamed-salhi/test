<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

//Route::get('/main',[MainController::class,'main'])->name('main');
//Route::get('/about',[MainController::class,'about'])->name('about');
//Route::get('/post',[MainController::class,'post'])->name('post');
//Route::get('/contact',[MainController::class,'contact'])->name('contact');
//Route::post('/contact',[MainController::class,'postContact'])->name('post.contact');
//
//
//Route::controller(\App\Http\Controllers\PostController::class)->prefix('posts')->name('posts.')->group(function (){
//    Route::get('/get','index')->name('get');
//    Route::get('/create/post','create')->name('create');
//    Route::post('/store','store')->name('store');
//    Route::get('/{id}/edit','edit')->name('edit');
//    Route::post('/update','update')->name('update');
//    Route::delete('/delete','delete')->name('delete');
//
//});
Route::get('test',function (){
    $post = \App\Models\Post::query()->with('category')->find(1);
    return $post;
});




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

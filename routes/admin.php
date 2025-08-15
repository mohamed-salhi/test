<?php

use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Post\PostController;
use App\Http\Controllers\Admin\Tag\TagController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('admin', function () {
    return 'admin';
});
Route::prefix('admin/')->name('admin.')->group(function () {
    Auth::routes();
    Route::controller(CategoryController::class)->prefix('categories')->name('categories.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::post('{id}/update', 'update')->name('update');
        Route::delete('{id}/delete', 'delete')->name('delete');
    });
    Route::controller(TagController::class)->prefix('tags')->name('tags.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::post('{id}/update', 'update')->name('update');
        Route::delete('{id}/delete', 'delete')->name('delete');
    });
    Route::controller(PostController::class)->prefix('posts')->name('posts.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::post('{id}/update', 'update')->name('update');
        Route::delete('{id}/delete', 'delete')->name('delete');
    });

});


Route::get('/', function () {
    return redirect()->route('admin.login');
});




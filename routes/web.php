<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\User\LoginController;
use \App\Http\Controllers\Admin\User\MainController;
use \App\Http\Controllers\Admin\MenuController;
use \App\Http\Controllers\Admin\ProductController;
use \App\Http\Controllers\Admin\UploadController;

Route::get('admin/users/login', [LoginController::class, 'index']) -> name('login');
Route::post('admin/users/login/store', [LoginController::class, 'store']);


Route::middleware(['auth'])->group(function () {

    Route::prefix('admin')->group(function() {
        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::get('main', [MainController::class, 'index']);

        #Menu
        Route::prefix('menu')->group(function(){
            Route::get('add', [MenuController::class, 'create']);
            Route::post('add', [MenuController::class, 'store']);
            Route::get('list', [MenuController::class, 'index']);
            Route::delete('destroy', [MenuController::class, 'destroy']);
            Route::get('edit/{menu}', [MenuController::class, 'show']);
            Route::post('edit/{menu}', [MenuController::class, 'update']);
        });

        #Products
        Route::prefix('products')->group(function() {
            Route::get('add', [ProductController::class, 'create']);
            Route::post('add', [ProductController::class, 'store']);
            Route::get('list', [ProductController::class, 'index']);
            Route::delete('destroy', [ProductController::class, 'destroy']);
            Route::get('edit/{product}', [ProductController::class, 'show']);
            Route::post('edit/{product}', [ProductController::class, 'update']);
        });

        #Upload
        Route::post('upload/services', [UploadController::class, 'store']);
    });
});


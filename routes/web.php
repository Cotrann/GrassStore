<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\User\LoginController;
use \App\Http\Controllers\Admin\User\MainController;
use \App\Http\Controllers\Admin\MenuController;
use \App\Http\Controllers\Admin\ProductController;
use \App\Http\Controllers\Admin\UploadController;
use \App\Http\Controllers\Admin\SliderController;
use \App\Http\Controllers\ShopController;

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
            Route::get('discount', [ProductController::class, 'getprice']);
            Route::post('discount', [ProductController::class, 'postprice']);
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

        #Sliders
        Route::prefix('sliders')->group(function() {
            Route::get('add', [SliderController::class, 'create']);
            Route::post('add', [SliderController::class, 'store']);
            Route::get('list', [SliderController::class, 'index']);
            Route::delete('destroy', [SliderController::class, 'destroy']);
            Route::get('edit/{slide}', [SliderController::class, 'show']);
            Route::post('edit/{slide}', [SliderController::class, 'update']);
        });


        #Upload
        Route::post('upload/services', [UploadController::class, 'store']);
    });
    Route::get('logout', [LoginController::class, 'logout']);
});

Route::get('/', [ShopController::class, 'index']);
Route::post('/get-product', [ShopController::class, 'getproduct']);

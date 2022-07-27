<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\User\LoginController;
use \App\Http\Controllers\Admin\User\MainController;
use \App\Http\Controllers\Admin\MenuController;
use \App\Http\Controllers\Admin\ProductController;
use \App\Http\Controllers\Admin\UploadController;
use \App\Http\Controllers\Admin\SliderController;
use \App\Http\Controllers\ShopController;
use \App\Http\Controllers\CategoriesController;
use \App\Http\Controllers\CartController;
use \App\Http\Controllers\CheckoutController;
use \App\Http\Controllers\UserController;


Route::get('/login', [LoginController::class, 'index']) -> name('login');
Route::post('/login/store', [LoginController::class, 'store']);
Route::post('/login', [LoginController::class, 'register']);


Route::middleware('checkAdmin')->group(function () {

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
    Route::get('logout', [UserController::class, 'logout']);
});

Route::get('/', [ShopController::class, 'index']);
Route::post('/get-product', [ShopController::class, 'getproduct']);
Route::post('/services/load-product', [ShopController::class, 'loadproduct']);
Route::get('danh-muc/{id}-{slug}.html', [CategoriesController::class, 'index']);
Route::get('san-pham/{id}-{slug}.html', [ShopController::class, 'detailproduct']);
Route::post('add-cart', [CartController::class, 'index']);
Route::get('carts', [CartController::class, 'show']);
Route::get('carts/delete/{id}/{size}', [CartController::class, 'destroy']);
Route::post('carts/update', [CartController::class, 'update']);

Route::middleware(['auth'])->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index']);
    Route::post('/checkout', [CheckoutController::class, 'store']);
    Route::get('/profile', [UserController::class, 'index']);
    Route::post('/profile', [UserController::class, 'update']);
    Route::post('/profile/changepassword', [UserController::class, 'changePassword']);
    Route::get('logout', [UserController::class, 'logout']);
});

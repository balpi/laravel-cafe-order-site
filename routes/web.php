<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;



Route::middleware('auth')->prefix('admin')->group(function () {

    Route::get("/", [App\Http\Controllers\admin\HomeController::class, "index"])
        ->name("admin");
    Route::get('category{items?}/{search?}/{alert?}', [CategoryController::class, "index"])->name('admin_category');
    Route::get('category/add', [CategoryController::class, "store"])->name('admin_category_add');
    Route::get('category/find/{id?}/{alert?}', [CategoryController::class, "find"])->name('admin_category_find');
    Route::post('category/update', [CategoryController::class, "update"])->name('admin_category_update');
    Route::get('category/remove/{id?}', [CategoryController::class, "destroy"])->name('admin_category_remove');


});

Route::middleware('auth')->prefix('admin/products')->group(function () {


    Route::get('{items?}/{search?}/{alert?}', [\App\Http\Controllers\admin\ProductController::class, "index"])->name('admin_product');
    Route::get('/add', [\App\Http\Controllers\admin\ProductController::class, "store"])->name('admin_product_add');
    Route::get('/find/{id?}/{alert?}', [\App\Http\Controllers\admin\ProductController::class, "find"])->name('admin_product_find');
    Route::post('/update', [\App\Http\Controllers\admin\ProductController::class, "update"])->name('admin_product_update');
    Route::get('/remove/{id?}', [\App\Http\Controllers\admin\ProductController::class, "destroy"])->name('admin_product_remove');


});

route::get("/home", [HomeController::class, "index"]);




route::post("/admin/LoginCheck", [App\Http\Controllers\admin\HomeController::class, "LoginCheck"])
    ->name("LoginCheck");


route::get("/login", [LoginController::class, "index"])->name('login');



route::post('/', [App\Http\Controllers\admin\HomeController::class, "logout"])->name("Logout");
route::get('/', function () {
    return view('welcome');
});
route::post('/logout', [\App\Http\Controllers\admin\HomeController::class, "logout"])->name('logout');



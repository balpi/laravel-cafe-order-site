<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;



Route::middleware('auth')->prefix('admin')->group(function () {

    Route::get("/", [App\Http\Controllers\admin\HomeController::class, "index"])
        ->name("admin");

    Route::get('category', [CategoryController::class, "index"])->name('admin_category');
    Route::get('category/add', [CategoryController::class, "store"])->name('admin_category_add');
    Route::get('category/add', [CategoryController::class, "update"])->name('admin_category_update');

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



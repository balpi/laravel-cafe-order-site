<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

route::get("/home", [HomeController::class, "index"]);
route::get("/admin/login", [LoginController::class, "index"]);
route::get("/admin", [\App\Http\Controllers\admin\HomeController::class, "index"])->name("admin");
route::post("/admin/LoginCheck", [\App\Http\Controllers\admin\HomeController::class, "LoginCheck"])->name("admin_LoginCheck");

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

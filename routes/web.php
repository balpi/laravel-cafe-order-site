<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

route::get("/home", [HomeController::class, "index"]);

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

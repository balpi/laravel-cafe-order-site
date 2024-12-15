<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\MaincategoryController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\OrdersController;
use App\Http\Controllers\admin\FaqsController;
use App\Http\Controllers\admin\MessagesController;
use App\Http\Controllers\admin\CommentController;
use Illuminate\Support\Facades\Route;



Route::middleware('auth')->prefix('admin')->group(function () {

    Route::get("/", [App\Http\Controllers\admin\HomeController::class, "index"])
        ->name("admin");
    Route::get('category{items?}/{search?}/{alert?}', [CategoryController::class, "index"])->name('admin_category');
    Route::get('category/add', [CategoryController::class, "create"])->name('admin_category_add');
    Route::post('category/store', [CategoryController::class, "store"])->name('admin_category_store');
    Route::get('category/find/{id?}/{alert?}', [CategoryController::class, "find"])->name('admin_category_find');
    Route::post('category/update', [CategoryController::class, "update"])->name('admin_category_update');
    Route::get('category/remove/{id?}', [CategoryController::class, "destroy"])->name('admin_category_remove');


});

Route::middleware('auth')->prefix('admin')->group(function () {


    Route::get('product/{items?}/{search?}/{alert?}', [ProductController::class, "index"])->name('admin_product');
    Route::get('products/add', [ProductController::class, "create"])->name('admin_product_add');
    Route::post('product/store', [ProductController::class, "store"])->name('admin_product_store');
    Route::get('products/find/{id?}/{alert?}', [ProductController::class, "find"])->name('admin_product_find');
    Route::post('product/update', [ProductController::class, "update"])->name('admin_product_update');
    Route::get('products/remove/{id?}', [ProductController::class, "destroy"])->name('admin_product_remove');


});

Route::middleware('auth')->prefix('admin')->group(function () {


    Route::get('maincategory/{items?}/{search?}/{alert?}', [MaincategoryController::class, "index"])->name('admin_maincategory');
    Route::get('maincategories/add', [MaincategoryController::class, "create"])->name('admin_maincategory_add');
    Route::post('maincategory/store', [MaincategoryController::class, "store"])->name('admin_maincategory_store');
    Route::get('maincategories/find/{id?}/{alert?}/', [MaincategoryController::class, "find"])->name('admin_maincategory_find');
    Route::post('maincategory/update', [MaincategoryController::class, "update"])->name('admin_maincategory_update');
    Route::get('maincategories/remove/{id?}', [MaincategoryController::class, "destroy"])->name('admin_maincategory_remove');


});

Route::middleware('auth')->prefix('admin')->group(function () {


    Route::get('user/{items?}/{search?}/{alert?}', [UserController::class, "index"])->name('admin_users');
    Route::get('users/add', [UserController::class, "create"])->name('admin_users_add');
    Route::post('user/store', [UserController::class, "store"])->name('admin_users_store');
    Route::get('users/find/{id?}/{alert?}/', [UserController::class, "find"])->name('admin_users_find');
    Route::post('user/update', [UserController::class, "update"])->name('admin_users_update');
    Route::get('users/remove/{id?}', [UserController::class, "destroy"])->name('admin_users_remove');


});

Route::middleware('auth')->prefix('admin/order')->group(function () {


    Route::get('{items?}/{search?}/{alert?}', [OrdersController::class, "index"])->name('admin_orders');
    Route::get('add', [OrdersController::class, "create"])->name('admin_orders_add');
    Route::post('store', [OrdersController::class, "store"])->name('admin_orders_store');
    Route::get('find/{id?}/{alert?}/', [OrdersController::class, "find"])->name('admin_orders_find');
    Route::post('update', [OrdersController::class, "update"])->name('admin_orders_update');
    Route::get('remove/{id?}', [OrdersController::class, "destroy"])->name('admin_orders_remove');


});

Route::middleware('auth')->prefix('admin')->group(function () {


    Route::get('faq/{items?}/{search?}/{alert?}', [FaqsController::class, "index"])->name('admin_faq');
    Route::get('faqs/add', [FaqsController::class, "create"])->name('admin_faq_add');
    Route::post('faq/store', [FaqsController::class, "store"])->name('admin_faq_store');
    Route::get('faqs/find/{id?}/{alert?}/', [FaqsController::class, "find"])->name('admin_faq_find');
    Route::post('faqs/update', [FaqsController::class, "update"])->name('admin_faq_update');
    Route::get('faqs/remove/{id?}', [FaqsController::class, "destroy"])->name('admin_faq_remove');


});

Route::middleware('auth')->prefix('admin/comments')->group(function () {


    Route::get('{items?}/{search?}/{alert?}', [CommentController::class, "index"])->name('admin_comments');
    Route::get('add', [CommentController::class, "create"])->name('admin_comments_add');
    Route::post('store', [CommentController::class, "store"])->name('admin_comments_store');
    Route::get('find/{id?}/{alert?}/', [CommentController::class, "find"])->name('admin_comments_find');
    Route::post('update', [CommentController::class, "update"])->name('admin_comments_update');
    Route::get('remove/{id?}', [CommentController::class, "destroy"])->name('admin_comments_remove');


});

Route::middleware('auth')->prefix('admin/messages')->group(function () {


    Route::get('{items?}/{search?}/{alert?}', [MessagesController::class, "index"])->name('admin_messages');
    Route::get('add', [MessagesController::class, "create"])->name('admin_messages_add');
    Route::post('store', [MessagesController::class, "store"])->name('admin_messages_store');
    Route::get('find/{id?}/{alert?}/', [MessagesController::class, "find"])->name('admin_messages_find');
    Route::post('update', [MessagesController::class, "update"])->name('admin_messages_update');
    Route::get('remove/{id?}', [MessagesController::class, "destroy"])->name('admin_messages_remove');


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



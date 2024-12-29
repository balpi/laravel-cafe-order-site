<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\SettingsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ImageController;
use App\Http\Controllers\admin\MaincategoryController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\OrdersController;
use App\Http\Controllers\admin\FaqsController;
use App\Http\Controllers\admin\MessagesController;
use App\Http\Controllers\admin\CommentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserRolesController;
use App\Http\Middleware\CheckAdmin;
use Illuminate\Support\Facades\Route;



Route::middleware('auth')
    ->middleware(['admin', CheckAdmin::class])->group(function () {

        Route::prefix('admin')->group(function () { //admin
    
            Route::get("/", [App\Http\Controllers\admin\HomeController::class, "index"])
                ->name("admin");
            Route::get('category{items?}/{search?}/{alert?}', [CategoryController::class, "index"])->name('admin_category');
            Route::get('category/add', [CategoryController::class, "create"])->name('admin_category_add');
            Route::post('category/store', [CategoryController::class, "store"])->name('admin_category_store');
            Route::get('category/find/{id?}/{alert?}', [CategoryController::class, "find"])->name('admin_category_find');
            Route::post('category/update', [CategoryController::class, "update"])->name('admin_category_update');
            Route::get('category/remove/{id?}', [CategoryController::class, "destroy"])->name('admin_category_remove');

            Route::get('product/{items?}/{search?}/{alert?}', [ProductController::class, "index"])->name('admin_product');
            Route::get('products/add', [ProductController::class, "create"])->name('admin_product_add');
            Route::post('product/store', [ProductController::class, "store"])->name('admin_product_store');
            Route::get('products/find/{id?}/{alert?}', [ProductController::class, "find"])->name('admin_product_find');
            Route::post('product/update', [ProductController::class, "update"])->name('admin_product_update');
            Route::get('products/remove/{id?}', [ProductController::class, "destroy"])->name('admin_product_remove');

            Route::get('maincategory/{items?}/{search?}/{alert?}', [MaincategoryController::class, "index"])->name('admin_maincategory');
            Route::get('maincategories/add', [MaincategoryController::class, "create"])->name('admin_maincategory_add');
            Route::post('maincategory/store', [MaincategoryController::class, "store"])->name('admin_maincategory_store');
            Route::get('maincategories/find/{id?}/{alert?}/', [MaincategoryController::class, "find"])->name('admin_maincategory_find');
            Route::post('maincategory/update', [MaincategoryController::class, "update"])->name('admin_maincategory_update');
            Route::get('maincategories/remove/{id?}', [MaincategoryController::class, "destroy"])->name('admin_maincategory_remove');

            Route::get('user/{items?}/{search?}/{alert?}', [UserController::class, "index"])->name('admin_users');
            Route::get('users/add', [UserController::class, "create"])->name('admin_users_add');
            Route::post('user/store', [UserController::class, "store"])->name('admin_users_store');
            Route::get('users/find/{id?}/{alert?}/', [UserController::class, "find"])->name('admin_users_find');
            Route::post('user/update', [UserController::class, "update"])->name('admin_users_update');
            Route::get('users/remove/{id?}', [UserController::class, "destroy"])->name('admin_users_remove');

            Route::get('order/{items?}/{search?}/{alert?}', [OrdersController::class, "index"])->name('admin_orders');
            Route::get('orders/add', [OrdersController::class, "create"])->name('admin_orders_add');
            Route::post('order/store', [OrdersController::class, "store"])->name('admin_orders_store');
            Route::get('orders/find/{id?}/{alert?}/', [OrdersController::class, "show"])->name('admin_orders_find');
            Route::post('order/update/{id?}', [OrdersController::class, "update"])->name('admin_orders_update');
            Route::get('orders/remove/{id?}', [OrdersController::class, "destroy"])->name('admin_orders_remove');


            Route::get('faq/{items?}/{search?}/{alert?}', [FaqsController::class, "index"])->name('admin_faq');
            Route::get('faqs/add', [FaqsController::class, "create"])->name('admin_faq_add');
            Route::post('faq/store', [FaqsController::class, "store"])->name('admin_faq_store');
            Route::get('faqs/find/{id?}/{alert?}/', [FaqsController::class, "find"])->name('admin_faq_find');
            Route::post('faqs/update', [FaqsController::class, "update"])->name('admin_faq_update');
            Route::get('faqs/remove/{id?}', [FaqsController::class, "destroy"])->name('admin_faq_remove');

            Route::get('comments/{items?}/{search?}/{alert?}', [CommentController::class, "index"])->name('admin_comments');
            Route::get('comments/add', [CommentController::class, "create"])->name('admin_comments_add');
            Route::post('comments/store', [CommentController::class, "store"])->name('admin_comments_store');
            Route::get('comment/find/{id?}/{alert?}/', [CommentController::class, "find"])->name('admin_comments_find');
            Route::post('comments/update', [CommentController::class, "update"])->name('admin_comments_update');
            Route::get('comments/remove/{id?}', [CommentController::class, "destroy"])->name('admin_comments_remove');

            Route::get('messages/{items?}/{search?}/{alert?}', [MessagesController::class, "index"])->name('admin_messages');
            Route::get('message/add', [MessagesController::class, "create"])->name('admin_messages_add');
            Route::post('store', [MessagesController::class, "store"])->name('admin_messages_store');
            Route::get('message/find/{id?}/{alert?}/', [MessagesController::class, "find"])->name('admin_messages_find');
            Route::post('update', [MessagesController::class, "update"])->name('admin_messages_update');
            Route::get('remove/{id?}', [MessagesController::class, "destroy"])->name('admin_messages_remove');


            Route::get('settings', [SettingsController::class, "index"])->name('admin_setting_get');
            Route::post('settings/update', [SettingsController::class, "store"])->name('admin_setting_update');

            Route::post('MakeAdmin/{id}', [UserRolesController::class, "MakeAdmin"])->name('MakeAdmin');

        });
        Route::prefix('admin/images')->group(function () {



            Route::get('add/{id?}', [ImageController::class, "create"])->name('admin_images_add');
            Route::post('store/{id?}{image?}', [ImageController::class, "store"])->name('admin_images_store');
            Route::get('find/{id?}/{alert?}/', [ImageController::class, "find"])->name('admin_images_find');
            Route::get('remove/{id?}/{pid?}', [ImageController::class, "destroy"])->name('admin_images_remove');




        });
    });


Route::middleware('auth')->group(function () {

    Route::get('myaccount', [UserController::class, "myaccount"])->name('myaccount');
    Route::get('slider', [\App\Http\Controllers\admin\HomeController::class, "sliderControl"])->name('admin_slider');
    Route::get('slider/add/{id}', [\App\Http\Controllers\admin\HomeController::class, "sliderAdd"])->name('admin_slider_add');
    Route::get('slider/delete/{id?}', [\App\Http\Controllers\admin\HomeController::class, "sliderDelete"])->name('admin_slider_remove');
    Route::post('slider/update/{id?}', [\App\Http\Controllers\admin\HomeController::class, "sliderUpdate"])->name('admin_slider_update');

});
Route::middleware('auth')->prefix('order')->group(function () {


    Route::get('/', [OrderController::class, "index"])->name('orders');
    Route::get('add', [OrderController::class, "create"])->name('order_add');
    Route::get('add/{id}', [OrderController::class, "orderDirect"])->name('order_addDirect');
    Route::post('store', [OrderController::class, "store"])->name('order_store');
    Route::get('find/{id?}/{alert?}', [OrderController::class, "find"])->name('order_find');
    Route::post('update', [OrderController::class, "update"])->name('order_update');
    Route::get('remove/{id?}', [OrderController::class, "destroy"])->name('order_remove');


});


route::get("/home", [HomeController::class, "index"])->name('home');
route::get("/about", [HomeController::class, "about"])->name('about');
route::get("/contact", [HomeController::class, "contact"])->name('contact');
route::post("/contact/sendmessage", [HomeController::class, "sendMessage"])->name('sendmessage');
route::get("/detail/{id}", [HomeController::class, "product"])->name('detail');
route::get("/search", [HomeController::class, "getProduct"])->name('getProduct');
route::get("/procucts/{categoryID}", [HomeController::class, "procuctsforCategory"])->name('procuctsforCategory');
route::get("/addreview", [HomeController::class, "addComment"])->name('addComment');


/* Shopping */
route::get("/cart", [HomeController::class, "addCart"])->name('cart');
route::get("/showcart", [HomeController::class, "showCart"])->name('showcart');
route::get("/removeitem/{id}", [HomeController::class, "removeCartItem"])->name('removeCartItem');

//route::get("/cart", [HomeController::class, "addCart"])->name('getcart');

Route::get("/faqs", [HomeController::class, "faqs"])->name('home_faqs');

route::post("/admin/LoginCheck", [App\Http\Controllers\admin\HomeController::class, "LoginCheck"])
    ->name("LoginCheck");


route::get("/login", [LoginController::class, "index"])->name('login');

route::get("/foriframe", function () {
    return view('home._blankpageForIframe');
})->name('iframeBlank');


route::post('/', [App\Http\Controllers\admin\HomeController::class, "logout"])->name("Logout");

route::post('/logout', [\App\Http\Controllers\admin\HomeController::class, "logout"])->name('logout');
Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', function () {
        return view('home.index');
    })->name('dashboard');
});


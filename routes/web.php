<?php

use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;

Route::get('/', [MainController::class, "homePage"])->name('home');
Route::get('/product/{product}', [MainController::class, "productPage"])->name('product-page');
Route::get('/search', [MainController::class, "products"])->name('products');
Route::get('/search/category/{category}', [MainController::class, "viewByCat"])->name('viewByCat');
Route::get('/search/{keyword}', [MainController::class, "search"])->name('products');
Route::get('/search/{search}/category/{category}', [MainController::class, "searchByCat"]);
Route::get('/register', [AuthController::class, "registerPage"])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, "register"])->name('registerAction')->middleware('guest');

Route::post('/test', [MainController::class, "test"]);


Route::get('/login', [AuthController::class, "loginPage"])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, "login"])->name('loginAction')->middleware('guest');

Route::get('/logout', [AuthController::class, "logout"])->name('logout')->middleware('auth');
Route::get('/cart', [CartController::class, "cartPage"]);

Route::post('/cart/add/{product}', [CartController::class, "addToCart"]);
Route::post('/cart/remove/{product}', [CartController::class, "removeFromCart"]);
Route::post('/cart/increment/{product}', [CartController::class, "incrementCart"]);
Route::post('/cart/decrement/{product}', [CartController::class, "decrementCart"]);
Route::post('/cart/order', [CartController::class, "order"])->middleware('auth');


//Admin Routes
Route::middleware(['auth', 'admin'])->group(function(){
    Route::get('/admin', [AdminController::class, 'homePage']);

    Route::get('/admin/products/add', [AdminController::class, 'addProductPage']);
    Route::post('/admin/products/add', [AdminController::class, 'addProduct']);
    
    Route::get('/admin/products', [AdminController::class, 'productsPage']);
    Route::get('/admin/categories', [AdminController::class, 'categoriesPage']);
    Route::get('/admin/carousel', [AdminController::class, 'carouselPage']);
    Route::get('/admin/carousel/add', [AdminController::class, 'addCarouselPage']);
    Route::post('/admin/carousel/add', [AdminController::class, 'addCarousel']);

    Route::get('/admin/categories/add', [AdminController::class, 'addCategoriesPage']);
    Route::post('/admin/categories/add', [AdminController::class, 'addCategory']);
    Route::get('/admin/product/{product}/categories', [AdminController::class, 'addProductCategoryPage']);
    Route::post('/admin/product/category/add/{product}', [AdminController::class, 'addProductCategory']);
    Route::get('/admin/product/category/delete/{product_category}', [AdminController::class, 'deleteProductCategory']);
    Route::get('/admin/product/delete/{product}', [AdminController::class, 'deleteProduct']);
    Route::get('/admin/product/edit/{product}', [AdminController::class, 'editProductPage']);
    Route::post('/admin/product/edit/{product}', [AdminController::class, 'editProduct']);
    Route::get('/admin/product/add/image/{product}', [AdminController::class, 'addProductImagePage']);
    Route::post('/admin/product/add/image/{product}', [AdminController::class, 'addProductImage']);


});
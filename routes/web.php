<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\StripeController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home');
});

Route::get('/user/{name}/dashboard', [CustomerController::class, 'customerDashboard'])
    ->middleware(['auth', 'role:customer'])
    ->name('customer.dashboard');

//Start Admin-Dashboard
Route::get('/admin/dashboard', function () {
    return view('layouts.backend.admin-dashboard.dashboard');
})
    ->middleware(['auth', 'role:admin'])
    ->name('admin.dashboard');
Route::prefix('/category')->group(function(){
    route::get('index',[CategoryController::class,'index'])->name('category.index');
    route::get('create',[CategoryController::class,'create'])->name('category.create');
    route::post('store',[CategoryController::class,'store'])->name('category.store');
    route::get('edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
    route::put('/{id}',[CategoryController::class,'update'])->name('category.update');
    route::delete('/delete/{id}',[CategoryController::class,'destroy'])->name('category.destroy');

});

//End Admin-Dashboard
Route::prefix('/')->group(function(){
    route::get('blog',[BlogController::class,'index'])->name('blog.index');
});
Route::prefix('/product')->group(function(){
    route::get('index',[ProductController::class,'index'])->name('product.index');
    route::get('create',[ProductController::class,'create'])->name('product.create');
    route::post('store',[ProductController::class,'store'])->name('product.store');
});
Route::prefix('/')->group(function () {
    route::get('contact-us',[ContactController::class,'index'])->name('contact.index');
});
Route::prefix('/')->middleware(['auth', 'verified'])->group(function () {
    route::get('shop',[ShopController::class,'shops'])->name('shop.index');
    route::get('shop-details/{id}',[ShopController::class,'shop_details'])->name('shop.details');
    // route::get('shop/product/{id}',[ShopController::class,'single_product'])->name('product.id');
    route::get('cart/{id}',[ShopController::class,'addToCart'])->name('add_to_cart');
});
Route::prefix('/')->middleware(['auth', 'verified'])->group(function(){
    route::get('cart',[CartController::class,'index'])->name('cart.index');
    route::patch('/update-cart',[CartController::class,'updateItem'])->name('update_from_cart');
    route::delete('/remove-item',[CartController::class,'removeItem'])->name('remove_from_cart');
    
});
Route::prefix('/')->group(function(){
    route::get('checkout',[CheckController::class,'index'])->middleware(['auth', 'verified'])->name('checkout.index');
});
Route::post('/session',[StripeController::class,'stripeSession'])->name('stripSession');
Route::get('/success',[StripeController::class,'success'])->name('success');
Route::get('/cancel',[StripeController::class,'cancel'])->name('cancel');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';

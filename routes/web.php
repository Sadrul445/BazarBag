<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\StripeController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', function () {
    return view('home');
});
Route::prefix('/')->group(function(){
    route::get('blog',[BlogController::class,'index'])->name('blog.index');
});
Route::prefix('/')->group(function(){
    route::get('product',[ProductController::class,'index']);
});
Route::prefix('/')->group(function () {
    route::get('contact-us',[ContactController::class,'index'])->name('contact.index');
});
Route::prefix('/')->group(function () {
    route::get('shop',[ShopController::class,'shops'])->name('shop.index');
    route::get('shop-details/{id}',[ShopController::class,'shop_details'])->name('shop.details');
    // route::get('shop/product/{id}',[ShopController::class,'single_product'])->name('product.id');
    route::get('cart/{id}',[ShopController::class,'addToCart'])->name('add_to_cart');
});
Route::prefix('/')->group(function(){
    route::get('cart',[CartController::class,'index'])->name('cart.index');
    route::patch('/update-cart',[CartController::class,'updateItem'])->name('update_from_cart');
    route::delete('/remove-item',[CartController::class,'removeItem'])->name('remove_from_cart');
    
});
Route::prefix('/')->group(function(){
    route::get('checkout',[CheckController::class,'index'])->name('checkout.index');
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

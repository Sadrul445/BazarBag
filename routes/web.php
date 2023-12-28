<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('frontend.home');
});
Route::prefix('/')->group(function () {
    route::get('contact-us',[ContactController::class,'index'])->name('contact.index');
});
Route::prefix('/shop')->group(function (){
    route::get('/shop-grid',[ShopController::class,'shop_grid_index'])->name('shopGrid.index');
});
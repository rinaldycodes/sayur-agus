<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\admin\DashboardAdminController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\TransactionController;
use App\Http\Controllers\admin\GalleryController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PageController::class, 'home']);
Route::get('/product', [PageController::class, 'product']);
Route::get('/product/{slug}', [PageController::class, 'detail_product']);
Route::get('/login', [LoginController::class, 'index']);
Route::post('/auth', [LoginController::class, 'processLogin']);
Route::get('/register', [LoginController::class, 'register']);
Route::post('/process-register', [LoginController::class, 'processRegister']);
Route::get('/logout', [LoginController::class, 'logout']);

///////////////////// CART CONTROLLER ///////////////////////////////
Route::post('/add-item/{slug}', [CartController::class, 'add_item']);
Route::get('store-cart/{slug}', [CartController::class, 'store']);
Route::get('/cart', [CartController::class, 'index']);
Route::get('/remove-item/{rowId}', [CartController::class, 'remove']);
Route::get('/update-item/{rowId}', [CartController::class, 'update']);
Route::get('/destroy-cart', [CartController::class, 'destroy']);
///////////////////// CART CONTROLLER ///////////////////////////////

///////////////////// SHIPPING CONTROLLER ///////////////////////////////
Route::get('/shipping', [ShippingController::class, 'index']);
Route::post('/shipping/store', [ShippingController::class, 'store']);
Route::get('/shipping/checkout', [ShippingController::class, 'checkout'])
    ->name('checkout');
    Route::get('/shipping/cetak', [ShippingController::class, 'cetak'])
    ->name('cetak');
///////////////////// SHIPPING CONTROLLER ///////////////////////////////

// ADMIN AREA
Route::prefix('admin')
    ->middleware('admin')
    ->group( function() {
    Route::get('/', [DashboardAdminController::class, 'index']);
    Route::resource('/products', ProductController::class);
    Route::resource('/transactions', TransactionController::class);
    Route::get('/galleries/delete/{id}', [GalleryController::class, 'delete']);
    Route::resource('/galleries', GalleryController::class);
    Route::resource('/categories', CategoryController::class);
});




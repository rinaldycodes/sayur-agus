<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\admin\DashboardAdminController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\TransactionController;
use App\Http\Controllers\admin\GalleryController;
use App\Http\Controllers\CartController;
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
Route::post('/logout', [LoginController::class, 'logout']);

// CART CONTROLLER
Route::post('/add-item/{slug}', [CartController::class, 'add_item']);
Route::get('store-cart/{slug}', [CartController::class, 'store']);
Route::get('/cart', [CartController::class, 'index']);
Route::get('/remove-item/{rowId}', [CartController::class, 'remove']);
Route::get('/update-item/{rowId}', [CartController::class, 'update']);
Route::get('/destroy-cart/{rowId}', [CartController::class, 'destroy']);
Route::get('/shipping', [CartController::class, 'shipping']);


// ADMIN AREA
Route::get('/admin', [DashboardAdminController::class, 'index']);

Route::resource('admin/products', ProductController::class);
Route::resource('admin/transactions', TransactionController::class);
Route::resource('admin/galleries', GalleryController::class);

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\admin\DashboardAdminController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\TransactionController;
use App\Http\Controllers\admin\GalleryController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\PaymentController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\DashboardUserController;
use App\Http\Controllers\User\PesananKamuController;
use App\Http\Controllers\User\PembayaranController;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;


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

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');



Route::get('/', [PageController::class, 'home']);
Route::get('/product', [PageController::class, 'product']);
Route::get('/p/{slug}', [PageController::class, 'category_page']);
Route::get('/product/{slug}', [PageController::class, 'detail_product']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
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
    Route::get('/shipping/cetak/{transaction_id}', [ShippingController::class, 'cetak'])
    ->name('cetak');
///////////////////// SHIPPING CONTROLLER ///////////////////////////////

/////////////////// AUTH AREA //////////////////////////////////
Route::middleware('auth.basic')
    ->group( function() {
        Route::get('/profile/change-password',[ ProfileController::class, 'changePassword']);
        Route::put('/profile/change-password/{id}',[ ProfileController::class, 'changePasswordProcess']);
        Route::resource('/profile', ProfileController::class);

    });
/////////////////////////// END AUTH AREA //////////////////////////////////

////////////////////////// USER AREA //////////////////////////////////
Route::prefix('user')
    ->middleware('auth.basic', 'verified')
    ->group( function() {
        Route::get('/', [DashboardUserController::class, 'index']);
        Route::get('/pesanan-kamu', [PesananKamuController::class, 'index']);
        Route::get('/pesanan-kamu/{id}', [PesananKamuController::class, 'show'])->name('pesanan-kamu.show');
        Route::resource('/pembayaran', PembayaranController::class);
    });
////////////////////////// END USER AREA //////////////////////////////////



////////////////////////// ADMIN AREA //////////////////////////////////
Route::prefix('admin')
    ->middleware('verified','auth.basic','admin', )
    ->group( function() {
    Route::get('/', [DashboardAdminController::class, 'index']);
    Route::resource('/users', UserController::class);
    Route::resource('/products', ProductController::class);
    Route::get('/transactions/laporan', [TransactionController::class, 'laporan'])->name('laporan.index');
    Route::post('/transactions/laporan/1', [TransactionController::class, 'search'])->name('laporan.true');
    Route::resource('/transactions', TransactionController::class);
    Route::get('/galleries/delete/{id}', [GalleryController::class, 'delete']);
    Route::resource('/galleries', GalleryController::class);
    Route::resource('/categories', CategoryController::class);
    Route::resource('/payments', PaymentController::class);
    
});
////////////////////////// ADMIN AREA //////////////////////////////////



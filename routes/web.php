<?php

use App\Http\Controllers\HomeController;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

use App\Http\Controllers\UserController;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Middleware\AuthMiddleware;

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
// Trang chủ
Route::prefix('/')->name('home')->group(function(){
    Route::get('/',[HomeController::class,'index']);
});

//Chi tiết sản phảm
Route::get('chi-tiet/{id}',[ProductController::class,'detail'])->name('detail');

//Đăng ký tài khoảm
Route::prefix('/dang-ky')->name('register')->group(function(){
    Route::get('/',[RegisterController::class,'getRegister']);
    Route::post('/',[RegisterController::class,'postRegister']);
});

//Giỏ hàng
Route::middleware('authmiddleware')->group(function(){
    Route::get('them-gio-hang/{id}',[CartController::class,'addCart'])->name('addcart');
    Route::get('xoa-gio-hang/{id}',[CartController::class,'deleteCart'])->name('deletecart');
    Route::get('gio-hang',[CartController::class,'index'])->name('showcart');

    Route::get('gio-hang/tang/{id}',[CartController::class,'increase'])->name('tang');
    Route::get('gio-hang/giam/{id}',[CartController::class,'reduce'])->name('giam');

    Route::get('mua-hang',[OrderController::class,'getOrder']);
    Route::get('xem-don-hang',[OrderController::class,'showOrder'])->name('showorder');
    Route::post('mua-hang',[OrderController::class,'addOrder'])->name('mua-hang');

    Route::prefix('tai-khoan')->name('taikhoan.')->group(function(){
        Route::get('/',[UserController::class,'showUser']);

        Route::get('/cap-nhat',[UserController::class,'getUser'])->name('getuser');
        Route::post('/cap-nhat',[UserController::class,'updateUser'])->name('postuser');
    });
});
//trang quản lý
Route::middleware('checkadmin')->group(function(){
    Route::prefix('/admin')->name('admin.')->group(function(){
        Route::get('/',[HomeController::class,'pageAdmin'])->name('page');
        //yêu cầu chi tiết sản phẩm cần thêm
        Route::get('/them-san-pham',[ProductController::class,'category'])->name('addproduct');
        Route::post('/them-san-pham',[ProductController::class,'addProduct']);
        // thêm sản phẩm
        Route::get('/them-san-pham/them-chi-tiet',[ProductController::class,'getDetail'])->name('adddetail');
        Route::post('/them-san-pham/them-chi-tiet',[ProductController::class,'addDetail']);
        //chỉnh sửa sản phảm
        Route::get('/chinh-sua/{id}',[ProductController::class,'getProduct'])->name('edit_product');
        Route::post('/chinh-sua/{id}',[ProductController::class,'editProduct']);
        // xem đơn hàng
        Route::get('/don-hang',[OrderController::class,'order'])->name('order');
        //xem tài khoản người dùng
        Route::get('/tai-khoan',[UserController::class,'user'])->name('user');
    });
});

//trang đăng nhập
Route::prefix('/dang-nhap')->name('login')->group(function(){
    Route::get('/',[LoginController::class,'getLogin']);
    Route::post('/',[LoginController::class,'postLogin']);
});

//thoát tài khoản
Route::get('/dang-xuat',[LogoutController::class,'getLogout'])->name('logout');


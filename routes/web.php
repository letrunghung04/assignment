<?php

use App\Http\Controllers\Admins\DanhMucController;
use App\Http\Controllers\Admins\SanPhamController;
use App\Http\Controllers\Admins\TaiKhoanController;
use App\Http\Controllers\Clients\HomeController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::resource('san_pham', SanPhamController::class);
Route::resource('danh_muc', DanhMucController::class);
Route::resource('tai_khoan', TaiKhoanController::class);
Route::resource('home', HomeController::class);
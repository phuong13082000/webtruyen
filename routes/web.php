<?php

use App\Http\Controllers\ChapterController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TheLoaiController;
use App\Http\Controllers\TruyenController;
use App\Http\Controllers\UserController;

Auth::routes();

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('danhmuc', DanhMucController::class);
    Route::resource('theloai', TheLoaiController::class);
    Route::resource('truyen', TruyenController::class);
    Route::resource('chapter', ChapterController::class);
    Route::resource('user', UserController::class);

    Route::get('/phan-quyen/{id}', [UserController::class, 'phanquyen']);
    Route::get('/phan-vai-tro/{id}', [UserController::class, 'phanvaitro']);
    Route::get('/impersonate/user/{id}', [UserController::class, 'impersonate']);

    Route::post('/insert-roles/{id}', [UserController::class, 'insert_roles']);
    Route::post('/assign-permission/{id}', [UserController::class, 'assign_permission']);
    Route::post('/insert-permission', [UserController::class, 'insert_permission']);

});

Route::get('/', [IndexController::class, 'home']);
Route::get('/xem-truyen/{slug}', [IndexController::class, 'xemtruyen']);
Route::get('/danh-muc/{slug}', [IndexController::class, 'danhmuc']);
Route::get('/the-loai/{slug}', [IndexController::class, 'theloai']);
Route::get('/xem-chapter/{slug}', [IndexController::class, 'xemchapter']);
Route::get('/tag/{tag}', [IndexController::class, 'tag']);

Route::post('/tim-kiem', [IndexController::class, 'timkiem']);
Route::post('/timkiem-ajax', [IndexController::class, 'timkiem_ajax']);

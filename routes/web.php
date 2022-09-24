<?php

use App\Http\Controllers\ChapterController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TheLoaiController;
use App\Http\Controllers\TruyenController;

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('danhmuc', DanhMucController::class);
Route::resource('theloai', TheLoaiController::class);
Route::resource('truyen', TruyenController::class);
Route::resource('chapter', ChapterController::class);

Route::get('/', [IndexController::class, 'home']);
Route::get('/xem-truyen/{slug}', [IndexController::class, 'xemtruyen']);
Route::get('/danh-muc/{slug}', [IndexController::class, 'danhmuc']);
Route::get('/the-loai/{slug}', [IndexController::class, 'theloai']);
Route::get('/xem-chapter/{slug}', [IndexController::class, 'xemchapter']);
Route::get('/tag/{tag}', [IndexController::class, 'tag']);

Route::post('/tim-kiem', [IndexController::class, 'timkiem']);
Route::post('/timkiem-ajax', [IndexController::class, 'timkiem_ajax']);
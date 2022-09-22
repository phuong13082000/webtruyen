<?php

use App\Http\Controllers\ChapterController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TruyenController;

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('danhmuc', DanhMucController::class);
Route::resource('truyen', TruyenController::class);
Route::resource('chapter', ChapterController::class);

Route::get('/', [IndexController::class, 'home']);
Route::get('/xem-truyen/{slug}', [IndexController::class, 'xemtruyen']);
Route::get('/danh-muc/{slug}', [IndexController::class, 'danhmuc']);
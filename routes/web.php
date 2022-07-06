<?php

use App\Http\Controllers\DanhMucController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TruyenController;

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('danhmuc', DanhMucController::class);
Route::resource('truyen', TruyenController::class);

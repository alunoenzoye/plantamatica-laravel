<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::get('/home', [HomeController::class, 'index'])->name('home.index');

Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/create-user', [UserController::class, 'create'])->name('user.create');
Route::get('/show-user/{user}', [UserController::class, 'show_user'])->name('user.show');
Route::get('edit-user/{user}', [UserController::class, 'edit'])->name('user.edit');
Route::post('/store-user', [UserController::class, 'store'])->name('user.store');
Route::put('update-user/{user}', [UserController::class, 'update'])->name('user.update');
Route::delete('destroy-user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
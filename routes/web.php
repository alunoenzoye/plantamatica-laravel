<?php

use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingPageController::class, 'index'])->name('landing-page.index');

Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/create-user', [UserController::class, 'create'])->name('user.create');
Route::get('/show-users', [UserController::class, 'show'])->name('user.users');
Route::get('/show-user/{user}', [UserController::class, 'show_user'])->name('user.show');
Route::post('/store-user', [UserController::class, 'store'])->name('user.store');
Route::get('edit-user/{user}', [UserController::class, 'edit'])->name('user.edit');
Route::put('update-user/{user}', [UserController::class, 'update'])->name('user.update');
<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('index');

// Route::get('/pdfTeste', [UserController::class, 'pdfTeste'])->name('user.pdfTeste');

Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::get('/register', [LoginController::class, 'register'])->name('login.register');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');
Route::post('/register-store', [LoginController::class, 'store'])->name('login.store');
Route::post('/auth', [LoginController::class, 'auth'])->name('login.auth');


// Middleware para previnir o acesso das páginas que precisam de autenticação
Route::group(['middleware' => 'auth'], function() {
    // Rotas da página do dashboard
    Route::get('/home', [HomeController::class, 'index'])->name('home.index');

    // Rotas da página de administração do usuário
    Route::get('/generate-pdf-user', [UserController::class, 'generate_pdf'])->name('user.generate-pdf');
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/create-user', [UserController::class, 'create'])->name('user.create');
    Route::get('/show-user/{user}', [UserController::class, 'show_user'])->name('user.show');
    Route::get('edit-user/{user}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/store-user', [UserController::class, 'store'])->name('user.store');
    Route::put('update-user/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('destroy-user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
});
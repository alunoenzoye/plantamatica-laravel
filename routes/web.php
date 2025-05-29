<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('index');

// Route::get('/pdfTeste', [UserController::class, 'pdfTeste'])->name('user.pdfTeste');

Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::get('/register', [LoginController::class, 'register'])->name('login.register');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');
Route::post('/register-store', [LoginController::class, 'store'])->name('login.store');
Route::post('/auth', [LoginController::class, 'auth'])->name('login.auth');

Route::redirect('/laravel/login', '/login')->name('login');


// Middleware para previnir o acesso das páginas que precisam de autenticação
Route::group(['middleware' => 'auth'], function() {
    // Rotas da página do dashboard
    Route::get('/home', [HomeController::class, 'index'])->name('home.index');

    // Rotas da página de perfil
    Route::get('/role', [RoleController::class, 'index'])->name('role.index')->middleware('permission:role');
    Route::get('/create-role', [RoleController::class, 'create'])->name('role.create')->middleware('permission:create-role');
    Route::post('/store-role', [RoleController::class, 'store'])->name('role.store')->middleware('permission:create-role');
    Route::get('/edit-role/{role}', [RoleController::class, 'edit'])->name('role.edit')->middleware('permission:edit-role');
    Route::put('/update-role/{role}', [RoleController::class, 'update'])->name('role.update')->middleware('permission:edit-role');
    Route::delete('/destroy-role/{role}', [RoleController::class, 'destroy'])->name('role.destroy')->middleware('permission:destroy-role');

    // Rotas da página de administração do usuário
    Route::get('/generate-pdf-user', [UserController::class, 'generate_pdf'])->name('user.generate-pdf');
    Route::get('/user', [UserController::class, 'index'])->name('user.index')->middleware('permission:user');
    Route::get('/create-user', [UserController::class, 'create'])->name('user.create')->middleware('permission:create-user');
    Route::get('/show-user/{user}', [UserController::class, 'show_user'])->name('user.show')->middleware('permission:show-user');
    Route::get('edit-user/{user}', [UserController::class, 'edit'])->name('user.edit')->middleware('permission:edit-user');
    Route::post('/store-user', [UserController::class, 'store'])->name('user.store');
    Route::put('update-user/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('destroy-user/{user}', [UserController::class, 'destroy'])->name('user.destroy')->middleware('permission:destroy-user');
});
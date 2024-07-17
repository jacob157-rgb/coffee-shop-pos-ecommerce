<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/profile', function () {
    return view('pages.dashboard.user.index');
});


Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard.index');
})->name('dashboard');

Route::controller(CategoryController::class)->group(function () {
    Route::get('/category', 'index')->name('category.index');
    Route::post('/category', 'store')->name('category.store');
    Route::put('/category/{id}', 'update')->name('category.update');
    Route::delete('/category/{id}', 'destroy')->name('category.destroy');
})->name('category');

Route::controller(ProductController::class)->group(function () {
    Route::get('/product', 'index')->name('product.index');
    Route::post('/product', 'store')->name('product.store');
    Route::get('/product/create', 'create')->name('product.create');
})->name('product');

Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'registerView')->name('auth.register');
    Route::post('/register', 'register')->name('register');
    Route::get('/login', 'loginView')->name('auth.login');
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->name('logout');
    // Google Route
    Route::get('/auth/google', 'providerView')->name('auth.google');
    Route::get('/auth/google/callback', 'handleProviderCallback')->name('auth.google.callback');
})->name('auth');

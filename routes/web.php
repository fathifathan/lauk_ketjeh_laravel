<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\ProductController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/cart', [SiteController::class, 'cart'])->name('cart');
Route::get('/add-to-cart/{id}', [SiteController::class, 'addToCart'])->name('add.to.cart');
Route::match(['get', 'post'], '/checkout', [SiteController::class, 'checkout'])->name('checkout');
Route::get('/login', [SiteController::class, 'showLogin'])->name('login');
Route::post('/process-auth', [SiteController::class, 'processAuth'])->name('process.auth');
Route::get('/logout', [SiteController::class, 'logout'])->name('logout');
Route::get('/menu/image/{id}', [SiteController::class, 'serveImage'])->name('menu.image');
Route::get('/menu/{id}', [HomeController::class, 'showMenu'])->name('menu.detail');

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
    ->name('admin.dashboard');
Route::get('/admin/member', function () {
    return view('admin.member');
});
Route::get('/admin/orders', function () {
    return view('admin.orders');
});
Route::get('/admin/menu', function () {
    return view('admin.menu');
});
Route::get('/admin/menu', [ProductController::class, 'index'])
    ->name('admin.menu');

Route::get('/products/menu', [ProductController::class, 'menu'])->name('admin.products.menu');
Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');
Route::post('/products', [ProductController::class, 'store'])->name('admin.products.store');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('admin.products.update');


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/', [HomeController::class, 'store'])->name('home.store');
Route::post('/store-product', [HomeController::class, 'store'])->name('store.product');
Route::delete('/products/{id}', 'ProductController@destroy')->name('products.destroy');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.page');
Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
Route::delete('/admin/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');
Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');

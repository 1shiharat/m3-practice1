<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SetMenuController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect(route('admin'));
});


Route::get('admin', [AdminController::class, 'index'])->middleware('auth')->name('admin');

Route::get('login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('login', [LoginController::class, 'check'])->middleware('guest');

Route::get('admin/store-product', [ProductController::class, 'index'])->middleware('auth')->name('store_product');
Route::post('admin/store-product', [ProductController::class, 'store'])->middleware('auth');

Route::get('admin/update-product/{id}', [ProductController::class, 'update_form'])->middleware('auth')->name('update_product');
Route::post('admin/update-product/{id}', [ProductController::class, 'update'])->middleware('auth');

Route::get('admin/delete-product/{id}', [ProductController::class, 'delete_confirm'])->middleware('auth')->name('delete_product');
Route::post('admin/delete-product/{id}', [ProductController::class, 'delete'])->middleware('auth');

Route::get('admin/store-set-menu', [SetMenuController::class, 'index'])->middleware('auth')->name('store_set_menu');
Route::post('admin/store-set-menu', [SetMenuController::class, 'store'])->middleware('auth');

Route::get('admin/update-set-menu/{id}', [SetMenuController::class, 'update_form'])->middleware('auth')->name('update_set_menu');
Route::post('admin/update-set-menu/{id}', [SetMenuController::class, 'update'])->middleware('auth');

Route::get('admin/delete-set-menu/{id}', [SetMenuController::class, 'delete_confirm'])->middleware('auth')->name('delete_set_menu');
Route::post('admin/delete-set-menu/{id}', [SetMenuController::class, 'delete'])->middleware('auth');

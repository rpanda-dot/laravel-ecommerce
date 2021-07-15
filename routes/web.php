<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\ProductController;
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
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function () {
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('amdin.login');


    // Routes for products in admin
    Route::get('/product/trashed', [ProductController::class, 'trashed'])->name('product.trashed');
    Route::get('/product/restore/{product}', [ProductController::class, 'restore'])->name('product.restore');
    Route::get('/product/empty-trashed', [ProductController::class, 'empty_trahsed'])->name('product.empty_trashed');
    Route::get('/product/permanenet-delete/{product}', [ProductController::class, 'permanenet_delete'])->name('product.permanenet_delete');
    Route::resource('product', ProductController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('brand', BrandController::class);
    Route::resource('customer', CustomerController::class);
});




// Admin Urls
Route::get('admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
Route::get('admin/profile', [AdminProfileController::class, 'adminProfile'])->name('admin.profile');
Route::get('admin/edit-profile', [AdminProfileController::class, 'editAdmin'])->name('admin.edit-profile');
Route::post('admin/profile/update', [AdminProfileController::class, 'updateProfile'])->name('admin.profile.update');

Route::get('admin/change/password', [AdminProfileController::class, 'changePasswordView'])->name('admin.change.password');
Route::post('admin/profile/update_password', [AdminProfileController::class, 'changePassword'])->name('admin.profile.change_password');





Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

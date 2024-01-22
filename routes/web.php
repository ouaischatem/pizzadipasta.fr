<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::get('/info', [App\Http\Controllers\InfoController::class, 'index'])->name('info');
Route::get('/mention', [App\Http\Controllers\MentionController::class, 'index'])->name('mention');
Route::get('/cgv', [App\Http\Controllers\CGVController::class, 'index'])->name('cgv');

//User
Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');
Route::get('/user/edit', [App\Http\Controllers\UserController::class, 'index'])->name('user.edit');
Route::patch('user/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');

// Cart
Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');
Route::get('/cart/remove/{id}', [App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart/increase/{id}', [App\Http\Controllers\CartController::class, 'increaseQuantity'])->name('cart.increase');
Route::get('/cart/decrease/{id}', [App\Http\Controllers\CartController::class, 'decreaseQuantity'])->name('cart.decrease');

// Product
Route::get('/order', [App\Http\Controllers\ProductController::class, 'index'])->name('order');
Route::post('/order/add/{id}', [App\Http\Controllers\ProductController::class, 'addToCart'])->name('order.add');
Route::get('/order/add/{id}', [App\Http\Controllers\ProductController::class, 'addToCart'])->name('order.add');
Route::get('/product/{id}', [App\Http\Controllers\ProductController::class, 'show'])->name('product.show');

//Posts
Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('posts');
Route::get('/posts/{id}', [App\Http\Controllers\PostController::class, 'show'])->name('posts.show');

//Admin
Route::get('/admin', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin');

// Admin Post
Route::get('/admin/posts', [App\Http\Controllers\Admin\Post\PostAdminController::class, 'index'])->name('admin.posts');
Route::get('/admin/posts/delete/{id}', [App\Http\Controllers\Admin\Post\PostAdminController::class, 'delete'])->name('admin.posts.delete');

// Admin Post Create
Route::get('/admin/posts/create', [App\Http\Controllers\Admin\Post\PostAdminCreateController::class, 'index'])->name('admin.posts.create');
Route::post('/admin/posts', [App\Http\Controllers\Admin\Post\PostAdminCreateController::class, 'store'])->name('admin.posts.store');

//Admin Post Edit
Route::get('/admin/posts/edit/{id}', [App\Http\Controllers\Admin\Post\PostAdminEditController::class, 'index'])->name('admin.posts.edit');
Route::patch('/admin/posts/edit/{id}', [App\Http\Controllers\Admin\Post\PostAdminEditController::class, 'edit'])->name('admin.posts.edit');

//Admin Maintenance
Route::get('/admin/maintenance', [App\Http\Controllers\Admin\Maintenance\MaintenanceAdminController::class, 'index'])->name('admin.maintenance');
Route::post('/admin/maintenance', [App\Http\Controllers\Admin\Maintenance\MaintenanceAdminController::class, 'toggleMaintenance'])->name('admin.maintenance.toggle');

//Admin User
Route::get('/admin/users', [App\Http\Controllers\Admin\User\UserAdminController::class, 'index'])->name('admin.users');
Route::get('/admin/users/delete/{id}', [App\Http\Controllers\Admin\User\UserAdminController::class, 'delete'])->name('admin.users.delete');

//admin User Edit
Route::get('/admin/users/edit/{id}', [App\Http\Controllers\Admin\User\UserAdminEditController::class, 'index'])->name('admin.users.edit');
Route::patch('/admin/users/edit/{id}', [App\Http\Controllers\Admin\User\UserAdminEditController::class, 'edit'])->name('admin.users.edit');

// Admin User Create
Route::get('/admin/users/create', [App\Http\Controllers\Admin\User\UserAdminCreateController::class, 'index'])->name('admin.users.create');
Route::post('/admin/users', [App\Http\Controllers\Admin\User\UserAdminCreateController::class, 'store'])->name('admin.users.store');

//Admin Product
Route::get('/admin/product', [App\Http\Controllers\Admin\Product\ProductAdminController::class, 'index'])->name('admin.product');
Route::get('/admin/product/delete/{id}', [App\Http\Controllers\Admin\Product\ProductAdminController::class, 'delete'])->name('admin.product.delete');

// Admin Product Create
Route::get('/admin/product/create', [App\Http\Controllers\Admin\Product\ProductCreateAdminController::class, 'index'])->name('admin.product.create');
Route::post('/admin/product', [App\Http\Controllers\Admin\Product\ProductCreateAdminController::class, 'store'])->name('admin.product.store');

//admin Product Edit
Route::get('/admin/product/edit/{id}', [App\Http\Controllers\Admin\Product\ProductEditAdminController::class, 'index'])->name('admin.product.edit');
Route::patch('/admin/product/edit/{id}', [App\Http\Controllers\Admin\Product\ProductEditAdminController::class, 'edit'])->name('admin.product.edit');

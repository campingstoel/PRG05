<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; 



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
    return view('auth/login');
});

Route::get('/products', [ProductController::class,'show'])->name('products');
Route::post('create', [ProductController::class,'store']);
Route::get('/search', [ProductController::class,'search']);


Route::get('/login', function () {
    return view('auth/login');
});

Route::get('/upload-product', function () {
  return view('create');
});

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin', function () {
      return view('admin/profile');
    })->name('dashboard');
  });





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::middleware(['auth'])->group(function () {
Route::get('/products/{id}', [ProductController::class,'details'])->name('details');
});
Route::middleware(['auth'])->group(function () {
Route::get('/edit/{id}', [ProductController::class,'edit'])->name('edit');
});
Route::post('editconfirm', [ProductController::class,'editstore']);






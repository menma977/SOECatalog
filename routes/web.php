<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [ProductController::class, 'index'])->name('welcome');

require __DIR__ . '/auth.php';

Route::middleware(['auth', 'verified'])->group(function () {
  Route::group(["prefix" => "dashboard", "as" => "dashboard."], function () {
    Route::get('', [HomeController::class, 'index'])->name('index');
  });
  Route::group(["prefix" => "category", "as" => "category."], function () {
    Route::get('', [CategoryController::class, 'index'])->name('index');
    Route::get('show/{data?}', [CategoryController::class, 'show'])->name('show');
    Route::post('store', [CategoryController::class, 'store'])->name('store');
    Route::post('update/{id}', [CategoryController::class, 'update'])->name('update');
    Route::get('delete/{id}', [CategoryController::class, 'destroy'])->name('delete');
  });
});

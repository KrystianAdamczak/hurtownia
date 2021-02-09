<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

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

Route::get('/productCategory', function () {
    return view('productCategory');
});

Route::resource('category', CategoryController::class);
Route::resource('product', ProductController::class);


Route::name('category.')->prefix('category')->group(function(){
    Route::get('', [CategoryController::class, 'index'])
        ->name('index');
    Route::get('create', [CategoryController::class, 'create'])
        ->name('create');
    Route::post('store', [CategoryController::class, 'store'])
        ->name('store');    
    Route::get('{id}/edit', [CategoryController::class, 'edit'])
        ->name('edit')
        ->where('id', '[0-9]+');
    Route::patch('{id}', [CategoryController::class, 'update'])
        ->name('update')
        ->where('id', '[0-9]+');
    Route::delete('{id}', [CategoryController::class, 'destroy'])
        ->name('destroy')
        ->where('id', '[0-9]+');
});


Route::name('product.')->prefix('product')->group(function(){
    Route::get('', [ProductController::class, 'index'])
        ->name('index');
    Route::get('create', [ProductController::class, 'create'])
        ->name('create');
    Route::post('store', [ProductController::class, 'store'])
        ->name('store');    
    Route::get('{id}/edit', [ProductController::class, 'edit'])
        ->name('edit')
        ->where('id', '[0-9]+');
    Route::patch('{id}', [ProductController::class, 'update'])
        ->name('update')
        ->where('id', '[0-9]+');
    Route::delete('{id}', [ProductController::class, 'destroy'])
        ->name('destroy')
        ->where('id', '[0-9]+');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

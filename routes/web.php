<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\StoreController;
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

//Route::middleware('auth')->group(function () {
    Route::get('/cadastrar-categorias', [CategoriesController::class, 'indexAdmin'])->name('categories');
    Route::post('/cadastrar-categorias', [CategoriesController::class, 'store'])->name('categories.store');
    Route::put('/cadastrar-categorias/{category}', [CategoriesController::class, 'update'])->name('categories.update');
    Route::delete('/cadastrar-categorias/{category}', [CategoriesController::class, 'destroy'])->name('categories.destroy');

    Route::get('/cadastrar-produtos', [ProductsController::class, 'index'])->name('products');
    Route::post('/cadastrar-produtos', [ProductsController::class, 'store'])->name('products.store');
    Route::put('/cadastrar-produtos/{product}', [ProductsController::class, 'update'])->name('products.update');
    Route::delete('/cadastrar-produtos/{product}', [ProductsController::class, 'destroy'])->name('products.destroy');

    Route::get('/', [CategoriesController::class, 'index'])->withoutMiddleware('auth')->name('homepage');

    Route::get('/categoria/{category}', [CategoriesController::class, 'show'])->withoutMiddleware('auth')->name('category');
    Route::get('/produto/{product}', [ProductsController::class, 'show'])->withoutMiddleware('auth')->name('product');
//});

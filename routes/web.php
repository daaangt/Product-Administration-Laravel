<?php

use App\Http\Controllers\CategoriesController;
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
    Route::get('cadastrar-produtos', [CategoriesController::class, 'products'])->name('products');
    Route::post('cadastrar-produtos/create', [CategoriesController::class, 'productStore'])->name('products.create');
    Route::put('cadastrar-produtos/{product}', [CategoriesController::class, 'productUpdate'])->name('products.edit');
    Route::delete('cadastrar-produtos/{product}', [CategoriesController::class, 'productDestroy'])->name('products.delete');

    Route::get('cadastrar-categorias', [CategoriesController::class, 'categories'])->name('categories');
    Route::post('cadastrar-categorias/create', [CategoriesController::class, 'categoryStore'])->name('categories.create');
    Route::put('cadastrar-categorias/{category}', [CategoriesController::class, 'categoryUpdate'])->name('categories.edit');
    Route::delete('cadastrar-categorias/{category}', [CategoriesController::class, 'categoryDestroy'])->name('categories.delete');

    Route::get('/', [CategoriesController::class, 'products'])->withoutMiddleware('auth')->name('dashboard');
//});

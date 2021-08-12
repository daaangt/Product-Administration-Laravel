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

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('cadastrar-produtos', [CategoriesController::class, 'products'])->name('products');
Route::post('cadastrar-produtos/create', [CategoriesController::class, 'productStore'])->name('products.create');
Route::post('cadastrar-produtos/delete/{product}', [CategoriesController::class, 'productDestroy'])->name('products.delete');
Route::post('cadastrar-produtos/edit/{product}', [CategoriesController::class, 'productUpdate'])->name('products.edit');

Route::get('cadastrar-categorias', [CategoriesController::class, 'categories'])->name('categories');
Route::post('cadastrar-categorias/create', [CategoriesController::class, 'categoryStore'])->name('categories.create');
Route::post('cadastrar-categorias/delete/{category}', [CategoriesController::class, 'categoryDestroy'])->name('categories.delete');
Route::post('cadastrar-categorias/edit/{category}', [CategoriesController::class, 'categoryUpdate'])->name('categories.edit');

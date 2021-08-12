<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the products and a form to additions.
     *
     * @return \Illuminate\Http\Response
     */
    public function products()
    {
        $products = Products::all();
        $categories = Categories::all();
        return view('dashboard.products', compact('products', 'categories'));
    }

    /**
     * Display a listing of the categories and a form to additions.
     *
     * @return \Illuminate\Http\Response
     */
    public function categories()
    {
        $categories = Categories::all();
        return view('dashboard.categories', compact('categories'));
    }

    /**
     * Store a newly created product resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function productStore(Request $request)
    {
        $validatedData = request()->validate([
            'name' => 'required|min:3',
            'categories_id' => 'required|integer',
            'quantity' => 'required|integer'
        ]);

        Products::create($validatedData);

        return redirect(route('products'));
    }

    /**
     * Store a newly created category resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function categoryStore(Request $request)
    {
        $validatedData = request()->validate([
            'name' => 'required|min:2'
        ]);

        Categories::create($validatedData);

        return redirect(route('categories'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Products  $product
     * @return \Illuminate\Http\Response
     */
    public function productDestroy(Products $product)
    {
        $product->delete();
        return redirect(route('products'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categories  $category
     * @return \Illuminate\Http\Response
     */
    public function categoryDestroy(Categories $category)
    {
        $category->delete();
        return redirect(route('categories'));
    }

/**
     * Update the specified product resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Products  $product
     * @return \Illuminate\Http\Response
     */
    public function productUpdate(Request $request, Products $product)
    {
        $validatedData = request()->validate([
            'name' => 'required|min:3',
            'categories_id' => 'required|integer',
            'quantity' => 'required|integer'
        ]);

        $product->update($validatedData);

        return redirect(route('products'));
    }

    /**
     * Update the specified category resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categories  $category
     * @return \Illuminate\Http\Response
     */
    public function categoryUpdate(Request $request, Categories $category)
    { 
        $validatedData = request()->validate([
            'name' => 'required|min:2'
        ]);

        $category->update($validatedData);

        return redirect(route('categories'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductsController extends Controller
{
    /**
     * Display a listing of the products and a form to additions.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::all();
        $categories = Categories::all();
        return view('management.products', compact('products', 'categories'));
    }

    /**
     * Display a listing of the products and a form to additions.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Products $product)
    {
        return view('product', compact('product'));
    }

    /**
     * Store a newly created product resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = request()->validate([
            'name' => 'required|min:3',
            'categories_id' => 'required|integer',
            'quantity' => 'required|integer',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'size' => ['required', Rule::in(['PP', 'P', 'M', 'G', 'GG', 'EG', 'EGG'])],
            'composition' => 'required|min:3|max:1000',
            'file.*' => 'mimes:jpg|max:5000',
            'file' => 'required|max:3',
        ]);

        $validatedData['file'] = [];
        $file_count = 0;
        if ($request->hasFile('file')) {
            foreach($request->file('file') as $file) {
                if($file->isValid()) {
                    $file->move(public_path('products\\'), $request->name . "_" . ++$file_count . "." . $file->getClientOriginalExtension());
                    array_push($validatedData['file'], 'products\\' . $request->name . "_" . $file_count . "." . $file->getClientOriginalExtension());
                }
            }
        }

        Products::create($validatedData);

        return redirect(route('products'));
    }

    /**
     * Update the specified product resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Products  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $product)
    {
        $validatedData = request()->validate([
            'name' => 'required|min:3',
            'categories_id' => 'required|integer',
            'quantity' => 'required|integer',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'size' => ['required', Rule::in(['PP', 'P', 'M', 'G', 'GG', 'EG', 'EGG'])],
            'composition' => 'required|min:3|max:1000',
            'file.*' => 'mimes:jpg,jpeg,bmp,png|max:5000',
            'file' => 'max:3',
        ]);

        if ($request->hasFile('file')) {
            $validatedData['file'] = [];
            $file_count = 0;

            foreach($product->file as $old_img) {
                if (file_exists(public_path($old_img))) {
                    unlink(public_path($old_img));
                }
            }

            foreach($request->file('file') as $file) {
                if($file->isValid()) {
                    $file->move(public_path('products\\'), $request->name . "_" . ++$file_count . "." . $file->getClientOriginalExtension());
                    array_push($validatedData['file'], 'products\\' . $request->name . "_" . $file_count . "." . $file->getClientOriginalExtension());
                }
            }
        }

        $product->update($validatedData);
        return redirect(route('products'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Products  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $product)
    {
        foreach($product->file as $file) {
            if (file_exists(public_path($file))) {
                unlink(public_path($file));
            }
        }

        $product->delete();
        return redirect(route('products'));
    }
}

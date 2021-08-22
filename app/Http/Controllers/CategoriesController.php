<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a list of the categories and a form to additions.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAdmin()
    {
        $categories = Categories::all();
        return view('management.categories', compact('categories'));
    }

    /**
     * Display a list of the categories
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $categories = Categories::all();
        return view('index', compact('categories'));
    }

    /**
     * Display a list of the products of a category
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Categories $category) {
        $title = $category->name;
        $products = Products::where('categories_id', $category->id)->orderBy('id')->get();

        return view('products', compact('products', 'title'));
    }

    /**
     * Store a newly created category resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = request()->validate([
            'name' => 'required|min:2',
            'file' => 'required|mimes:jpg'
        ]);

        if ($request->hasFile('file')) {
            if($request->file('file')->isValid()) {
                $request->file('file')->move(public_path('categories\\'), $request->name . "." . $request->file('file')->getClientOriginalExtension());
                $validatedData['file'] = 'categories\\' . $request->name . "." . $request->file('file')->getClientOriginalExtension();
            }
        }

        Categories::create($validatedData);
        return redirect()->back()->with('success', 'Registro criado com sucesso');
    }

    /**
     * Update the specified category resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categories  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categories $category)
    {
        $validatedData = request()->validate([
            'name' => 'required|min:2',
            'file' => 'mimes:jpg'
        ]);

        if ($request->hasFile('file')) {
            if($request->file('file')->isValid()) {
                if (file_exists(public_path($category->file))) {
                    unlink(public_path($category->file));
                }

                $request->file('file')->move(public_path('categories\\'), $request->name . "." . $request->file('file')->getClientOriginalExtension());
                $validatedData['file'] = 'categories\\' . $request->name . "." . $request->file('file')->getClientOriginalExtension();
            }
        }

        $category->update($validatedData);
        return redirect()->back()->with('success', 'Registro alterado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categories  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categories $category)
    {
        if (file_exists(public_path($category->file))) {
            unlink(public_path($category->file));
        }

        $category->delete();
        return redirect()->back()->with('success', 'Registro deletado com sucesso');
    }
}

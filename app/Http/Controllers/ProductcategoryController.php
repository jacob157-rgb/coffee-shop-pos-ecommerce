<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product_category = ProductCategory::orderBy('id','desc')->get();
        return view('pages.category.index', [
            'index' => $product_category
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category' => 'required|max:255|unique:product_category',
        ],);
        ProductCategory::create($validatedData,);
            return redirect('/category')->with('success', 'Data berhasil tersimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product_category = ProductCategory::find($id);
        return view('pages.category.edit', [
            'edit' => $product_category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
        $rules = [
            'category' => 'required|max:255',
        ];
        $validatedData = $request->validate($rules);
        ProductCategory::where('id', $id)->update($validatedData);
        return redirect('/category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product_category = ProductCategory::findOrFail($id);
        $product_category->delete();
        return redirect('/category')->with('msgSuccess', 'Data berhasil dihapus');
    }
}

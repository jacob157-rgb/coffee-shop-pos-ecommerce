<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = Product::orderBy('id','desc')->get();
        return view('pages.product.index', [
            'index' => $produk
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category_p = ProductCategory::orderBy('category', 'asc')->get();
        return view('pages.product.create', [
            'category' => $category_p
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required',
            'product_name' => 'required|max:255',
            'product_pict' => 'required',
            'product_desc' => 'required',
        ],);
        Product::create($validatedData,);
            return redirect('/product')->with('success', 'Data berhasil tersimpan');
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
        $product = Product::find($id);
        $category_p = ProductCategory::orderBy('category', 'asc')->get();
        return view('pages.product.edit', [
            'edit' => $product,
            'category' => $category_p
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
        $rules = [
            'category_id' => 'required',
            'product_name' => 'required|max:255',
            'product_pict' => 'required',
            'product_desc' => 'required',
        ];
        $validatedData = $request->validate($rules);
        Product::where('id', $id)->update($validatedData);
        return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect('/product')->with('msgSuccess', 'Data berhasil dihapus');
    }
}

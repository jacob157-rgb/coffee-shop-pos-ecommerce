<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use App\Models\ProductSku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.dashboard.product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::all();
        return view('pages.dashboard.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            // Validasi input
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'category_id' => 'required|exists:categories,id',
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'description' => 'required|string',
                'sku.*.name' => 'required|string|max:255',
                'sku.*.photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'sku.*.price' => 'required|numeric',
            ]);

            // Upload foto produk
            if ($request->hasFile('photo')) {
                $productPhotoPath = $request->file('photo')->store('product_photos', 'public');
            }

            // Simpan data produk
            $product = Product::create([
                'isactive' => 1, // Sesuaikan dengan kebutuhan
                'category_id' => $validatedData['category_id'],
                'name' => $validatedData['name'],
                'photo' => $productPhotoPath ?? null,
                'description' => $validatedData['description'],
            ]);

            // Simpan data SKU
            if ($request->has('sku')) {
                foreach ($request->sku as $sku) {
                    if (isset($sku['photo'])) {
                        $skuPhotoPath = $sku['photo']->store('sku_photos', 'public');
                    }
                    ProductSku::create([
                        'product_id' => $product->id,
                        'sku' => $sku['name'],
                        'photo' => $skuPhotoPath ?? null,
                        'price' => $sku['price'],
                        'stock' => 0, // Sesuaikan dengan kebutuhan
                    ]);
                }
            }

            DB::commit();

            return redirect()->route('product.create')->with('success', 'Produk berhasil dibuat beserta SKU-nya.');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan produk: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}

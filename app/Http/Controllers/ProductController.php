<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use App\Models\ProductSku;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Intervention\Image\Laravel\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Product::query();

        $query->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name as category_name');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($query) use ($search) {
                $query->where('products.name', 'like', '%' . $search . '%')
                    ->orWhere('categories.name', 'like', '%' . $search . '%')
                    ->orWhere('products.description', 'like', '%' . $search . '%');
            });
        }

        $pageSize = $request->input('pageSize', 10); // Default to 10 if not provided

        $products = $query->orderBy('id', 'desc')->paginate($pageSize);

        if ($request->ajax()) {
            return response()->json([
                'html' => View::make('partials.product_table', compact('products'))->render(),
                'pagination' => [
                    'currentPage' => $products->currentPage(),
                    'lastPage' => $products->lastPage(),
                    'path' => $request->url(),
                    'pageSize' => $pageSize,
                ]
            ]);
        }
        return view('pages.dashboard.product.index', compact('products'));
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
        // dd($request);
        DB::beginTransaction();
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'category_id' => 'required|exists:categories,id',
                'desc' => 'required|string',
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif',
                'sku.*.name' => 'required|string|max:255',
                'sku.*.price' => 'required|numeric',
                'sku.*.stock' => 'required|numeric',
                'sku.*.photo' => 'required|image|mimes:jpeg,png,jpg,gif',
            ]);


            // Upload foto produk
            if ($request->hasFile('photo')) {
                $product_photo = $request->file('photo');
                $filename = 'product.' . time() . '.' . $product_photo->getClientOriginalExtension();
                $path = public_path('images/product/' . $filename);
                $directory = dirname($path);
                if (!File::isDirectory($directory)) {
                    File::makeDirectory($directory, 0755, true);
                }
                $product_photo = Image::read($product_photo->getRealPath());
                $product_photo->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($path);
            }

            // Simpan data produk
            $product = Product::create([
                'isactive' => 1,
                'category_id' => $validatedData['category_id'],
                'name' => $validatedData['name'],
                'photo' => $path ?? null,
                'description' => $validatedData['desc'],
            ]);

            // Simpan data SKU
            if ($request->has('sku')) {
                foreach ($request->sku as $index => $sku) {
                    if (isset($request->sku[$index]['photo'])) {
                        $sku_photo = $request->file("sku.$index.photo");
                        $filename = 'sku.' . time() . '.' . $sku_photo->getClientOriginalExtension();
                        $skuPath = public_path('images/product/sku/' . $filename);
                        $directory = dirname($skuPath);
                        if (!File::isDirectory($directory)) {
                            File::makeDirectory($directory, 0755, true);
                        }
                        $sku_photo = Image::read($sku_photo->getRealPath());
                        $sku_photo->resize(300, 300, function ($constraint) {
                            $constraint->aspectRatio();
                        })->save($skuPath);
                    }
                    ProductSku::create([
                        'product_id' => $product->id,
                        'sku' => $sku['name'],
                        'photo' => $skuPath ?? null,
                        'price' => str_replace('.', '', $sku['price']),
                        'stock' => $sku['stock'],
                    ]);
                }
            }

            DB::commit();
            flash()->option('position', 'bottom-right')->success('Product & SKU Ditambahkan!');
            return redirect()->route('product.create');
        } catch (\Exception $e) {
            DB::rollBack();
            flash()->option('position', 'bottom-right')->error('Terjadi kesalahan saat menyimpan produk: ' . $e->getMessage());
            return redirect()->route('product.create');
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
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $skus = ProductSku::where('product_id', $id)->get();
        $categories = Categories::all();
        return view('pages.dashboard.product.edit', compact('product', 'categories', 'skus'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        dd($id, $request);
        DB::beginTransaction();
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'category_id' => 'required|exists:categories,id',
                'desc' => 'required|string',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif',
                'sku.*.name' => 'required|string|max:255',
                'sku.*.price' => 'required|numeric',
                'sku.*.stock' => 'required|numeric',
                'sku.*.photo' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            ]);

            $product = Product::findOrFail($id);

            // Upload foto produk jika ada file baru
            if ($request->hasFile('photo')) {
                $product_photo = $request->file('photo');
                $filename = 'product.' . time() . '.' . $product_photo->getClientOriginalExtension();
                $path = public_path('images/product/' . $filename);
                $directory = dirname($path);
                if (!File::isDirectory($directory)) {
                    File::makeDirectory($directory, 0755, true);
                }
                $product_photo = Image::read($product_photo->getRealPath());
                $product_photo->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($path);

                // Hapus foto lama jika ada
                if ($product->photo) {
                    File::delete(public_path($product->photo));
                }
                $product->photo = $path;
            }

            // Update data produk
            $product->update([
                'category_id' => $validatedData['category_id'],
                'name' => $validatedData['name'],
                'description' => $validatedData['desc'],
            ]);

            // Update atau tambahkan data SKU
            if ($request->has('sku')) {
                foreach ($request->sku as $index => $sku) {
                    $skuData = [
                        'sku' => $sku['name'],
                        'price' => str_replace('.', '', $sku['price']),
                        'stock' => $sku['stock'],
                    ];

                    // Upload foto SKU jika ada file baru
                    if (isset($request->sku[$index]['photo'])) {
                        $sku_photo = $request->file("sku.$index.photo");
                        $filename = 'sku.' . time() . '.' . $sku_photo->getClientOriginalExtension();
                        $skuPath = public_path('images/product/sku/' . $filename);
                        $directory = dirname($skuPath);
                        if (!File::isDirectory($directory)) {
                            File::makeDirectory($directory, 0755, true);
                        }
                        $sku_photo = Image::read($sku_photo->getRealPath());
                        $sku_photo->resize(300, 300, function ($constraint) {
                            $constraint->aspectRatio();
                        })->save($skuPath);
                        $skuData['photo'] = $skuPath;

                        // Hapus foto lama jika ada
                        $oldSku = ProductSku::find($sku['id']);
                        if ($oldSku && $oldSku->photo) {
                            File::delete(public_path($oldSku->photo));
                        }
                    }

                    // Update atau buat baru SKU
                    if (isset($sku['id'])) {
                        ProductSku::where('id', $sku['id'])->update($skuData);
                    } else {
                        $skuData['product_id'] = $product->id;
                        ProductSku::create($skuData);
                    }
                }
            }

            DB::commit();
            flash()->option('position', 'bottom-right')->success('Product & SKU Diperbarui!');
            return redirect()->route('product.index');
        } catch (\Exception $e) {
            DB::rollBack();
            flash()->option('position', 'bottom-right')->error('Terjadi kesalahan saat memperbarui produk: ' . $e->getMessage());
            return redirect()->route('product.edit', ['id' => $id]);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function updateIsActive(Request $request, $id)
    {
        $request->validate([
            'isactive' => 'required',
        ]);

        $product = Product::find($id);
        $product->isactive = $request->isactive;
        $product->save();

        flash()->option('position', 'bottom-right')->success('Produk Diperbarui!');
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        flash()->option('position', 'bottom-right')->success('Produk Dihapus!');
        return redirect()->route('product.index');
    }

    public function variantDestroy($id)
    {
        $variant = ProductSku::findOrFail($id);
        $variant->delete();

        flash()->option('position', 'bottom-right')->success('Variant Dihapus!');
        return redirect()->route('product.edit', $id);
    }
}

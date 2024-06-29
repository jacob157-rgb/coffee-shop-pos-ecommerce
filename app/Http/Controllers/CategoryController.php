<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $perPage = 10; // Jumlah item per halaman
    $categories = Categories::orderBy('id', 'desc')->paginate($perPage);

    // Menyediakan data pagination untuk view
    $pagination = [
        'currentPage' => $categories->currentPage(),
        'lastPage' => $categories->lastPage(),
        'path' => $request->url()
    ];

    return view('pages.dashboard.category.index', compact('categories', 'pagination'));
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
            'name' => 'required|max:255|unique:categories,name'
        ]);
        $category = Categories::create($validatedData);

        if ($category) {
            flash()->option('position','bottom-right')->success('Kategori Ditambahkan!');
            return redirect()->route('category.index');
        }

        flash()->option('position','bottom-right')->error('Ada yang Salah coba lagi nanti!');
        return redirect()->route('category.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Categories::findOrFail($id);
        return view('pages.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:categories,name,' . $id,
        ]);

        $category = Categories::findOrFail($id);
        $category->update($validatedData);

        flash()->option('position','bottom-right')->success('Kategori Diperbarui!');
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Categories::findOrFail($id);
        $category->delete();

        flash()->option('position','bottom-right')->success('Kategori Dihapus!');
        return redirect()->route('category.index');
    }
}

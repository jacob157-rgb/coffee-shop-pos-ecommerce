<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CategoryController extends Controller
{

    public function index(Request $request)
    {
        $query = Categories::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $pageSize = $request->input('pageSize', 10); // Default to 10 if not provided

        $categories = $query->orderBy('id', 'desc')->paginate($pageSize);

        if ($request->ajax()) {
            return response()->json([
                'html' => View::make('partials.category_table', compact('categories'))->render(),
                'pagination' => [
                    'currentPage' => $categories->currentPage(),
                    'lastPage' => $categories->lastPage(),
                    'path' => $request->url(),
                    'pageSize' => $pageSize,
                ]
            ]);
        }

        return view('pages.dashboard.category.index', compact('categories'));
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
            flash()->option('position', 'bottom-right')->success('Kategori Ditambahkan!');
        } else {
            flash()->option('position', 'bottom-right')->error('Ada yang Salah coba lagi nanti!');
        }

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

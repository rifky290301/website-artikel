<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.pages.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.pages.category.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|unique:categories|max:50',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect('/admin/kategori')->with('success', "Kategori $request->name berhasil ditambahkan!");
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.pages.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:50',
        ]);
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
        return redirect('/admin/kategori')->with('success', "Kategori $request->name berhasil diubah!");
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect('/admin/kategori')->with('success', "Kategori $category->name berhasil dihapus!");
    }
}

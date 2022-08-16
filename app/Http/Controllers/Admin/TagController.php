<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{

    public function index()
    {
        $tags = Tag::latest()->get();
        return view('admin.pages.tag.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.pages.tag.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|unique:tags|max:50',
        ]);

        Tag::create([
            'name' => $request->name,
        ]);

        return redirect('/admin/tag')->with('success', "Tag $request->name berhasil ditambahkan!");
    }

    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('admin.pages.tag.edit', compact('tag'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:50',
        ]);
        $tag = Tag::find($id);
        $tag->name = $request->name;
        $tag->save();
        return redirect('/admin/tag')->with('success', "Tag $request->name berhasil diubah!");
    }

    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        return redirect('/admin/tag')->with('success', "Tag $tag->name berhasil dihapus!");
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('admin.pages.post.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::latest()->get();
        $tags = Tag::latest()->get();
        return view('admin.pages.post.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'author' => 'required|string',
            'title' => 'required|string',
            'content' => 'required|string',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|string',
            'category_id' => 'required',
        ]);

        $date = date('H-i-s');
        $request->file('thumbnail')->move('upload/post', $date . $request->file('thumbnail')->getClientOriginalName());
        $request->thumbnail = $date . $request->file('thumbnail')->getClientOriginalName();

        Post::create([
            'author' => $request->author,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'thumbnail' => $request->thumbnail,
            'status' => $request->status,
            'category_id' => $request->category_id,
            'user_id' => auth()->user()->id,
        ]);

        return redirect('/admin/artikel')->with('success', "Post $request->title berhasil ditambahkan!");
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::latest()->get();
        $tags = Tag::latest()->get();
        return view('admin.pages.post.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'author' => 'required|string',
            'title' => 'required|string',
            'content' => 'required|string',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|string',
            'category_id' => 'required',
        ]);
        $date = date('H-i-s');
        $request->file('thumbnail')->move('upload/post', $date . $request->file('thumbnail')->getClientOriginalName());
        $request->thumbnail = $date . $request->file('thumbnail')->getClientOriginalName();
        $post = Post::find($id);

        $path = "upload/post/" . $post->thumbnail;
        unlink($path);

        $post->update([
            'author' => $request->author,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'thumbnail' => $request->thumbnail,
            'status' => $request->status,
            'category_id' => $request->category_id,
            'user_id' => auth()->user()->id,
        ]);
        return redirect('/admin/artikel')->with('success', "Post $request->title berhasil diupdate!");
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/admin/artikel')->with('success', "Post $post->title berhasil dihapus!");
    }
}

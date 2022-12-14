<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $firstPost = Post::with('category')->where('status', 'publish')->first();
        $sliders = Post::where('status', 'publish')->latest()->take(3)->get();
        $articles = Post::where('status', 'publish')->latest()->take(3)->get();
        $news = Post::where('status', 'publish')->latest()->take(3)->get();
        $latest = Post::where('status', 'publish')->latest()->take(5)->get();

        $random1 = Post::inRandomOrder()->where('status', 'publish')->first();
        $random1_2 = Post::inRandomOrder()->where('status', 'publish')->first();
        $random2 = Post::inRandomOrder()->where('status', 'publish')->limit(2)->get();
        $random3 = Post::inRandomOrder()->where('status', 'publish')->limit(5)->get();

        return view('welcome', compact('sliders', 'firstPost', 'articles', 'news', 'latest', 'random1', 'random1_2', 'random2', 'random3'));
    }

    public function show($slug)
    {
        $popular = Post::inRandomOrder()->where('status', 'publish')->limit(5)->get();
        $latest = Post::where('status', 'publish')->latest()->take(5)->get();
        $categories = Category::latest()->get();
        $tags = Tag::latest()->get();

        $post = Post::with('tags')->where('slug', $slug)->first();
        return view('user.pages.show', compact('post', 'popular', 'latest', 'categories', 'tags'));
    }

    public function tag($id)
    {
        $popular = Post::inRandomOrder()->limit(5)->get();
        $latest = Post::latest()->take(5)->get();
        $categories = Category::latest()->get();
        $tags = Tag::latest()->get();

        // $users = DB::table('posts')->select('*')
        //     ->join('post_tags', 'posts.id', '=', 'post_tags.post_id')
        //     ->join('tags', 'tags.id', '=', 'post_tags.tag_id')
        //     ->where('post_tags.post_id', 'posts.id')
        //     ->where('post_tags.tag_id', $id)
        //     ->get();
        $post = Post::with('tags')->where('id', $id)->first();

        // return response()->json($users);
        return view('user.pages.tag', compact('posts', 'popular', 'latest', 'categories', 'tags'));
    }

    public function category($id)
    {
        $popular = Post::inRandomOrder()->where('status', 'publish')->limit(5)->get();
        $latest = Post::where('status', 'publish')->latest()->take(5)->get();
        $categories = Category::latest()->get();
        $tags = Tag::latest()->get();

        $posts = Post::with('category')->where('category_id', $id)->paginate(5);
        return view('user.pages.category', compact('posts', 'popular', 'latest', 'categories', 'tags'));
    }

    public function search(Request $request)
    {
        $popular = Post::inRandomOrder()->limit(5)->get();
        $latest = Post::latest()->take(5)->get();
        $categories = Category::latest()->get();
        $tags = Tag::latest()->get();

        $searchWord = $request->get('s');
        $posts = Post::where(function ($query) use ($searchWord) {
            $query->where('title', 'LIKE', "%$searchWord%")
                ->orWhere('author', 'LIKE', "%$searchWord%")
                ->orWhere('content', 'LIKE', "%$searchWord%");
        })->with('category')->paginate(5);
        return view('user.pages.allpost', compact('posts', 'popular', 'latest', 'categories', 'tags'));
    }

    public function about()
    {
        return view('user.pages.about');
    }

    public function contact()
    {
        return view('user.pages.contact');
    }
}

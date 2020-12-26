<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Post;
use App\Setting;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home()
    {
        if (Auth::user()->role != "administrator") return redirect()->route('home');

        return view('admin.home');
    }

    public function category()
    {
        if (Auth::user()->role != "administrator") return redirect()->route('home');

        $categorys = Category::join('post', 'post.category_id', '=', 'category.id')->select('category.*', DB::raw('count(post.id) as articulos'))->groupBy('category.id')->get();

        return view('admin.category.view', ['category' => $categorys]);
    }

    public function articles()
    {
        if (Auth::user()->role != "administrator") return redirect()->route('home');

        $articles = Article::join('post', 'post.id', '=', 'articles.id_post')->join('category', 'category.id', '=', 'articles.id_category')->select('post.title as title_product', 'category.title as title_category', 'articles.*')->get();

        return view('admin.article.view', ['articles' => $articles]);
    }

    public function articles_create()
    {
        if (Auth::user()->role != "administrator") return redirect()->route('home');

        $categorys = Category::orderBy('id', 'desc')->get();

        $product = Post::orderBy('id', 'desc')->get();

        return view('admin.article.create', ['product' => $product, 'category' => $categorys]);
    }

    public function products()
    {
        if (Auth::user()->role != "administrator") return redirect()->route('home');

        $categorys = Category::orderBy('id', 'desc')->get();

        $product = Post::join('category', 'category.id', '=', 'post.category_id')->select('category.title as title_category', 'post.*')->get();

        return view('admin.product.view', ['product' => $product, 'category' => $categorys]);
    }

    public function users()
    {
        if (Auth::user()->role != "administrator") return redirect()->route('home');

        $users = User::orderBy('id', 'desc')->get();

        return view('admin.user.view', ['users' => $users]);
    }

    public function settings()
    {
        if (Auth::user()->role != "administrator") return redirect()->route('home');

        $setting = Setting::first();

        return view('admin.setting.view', ['setting' => $setting]);
    }
}

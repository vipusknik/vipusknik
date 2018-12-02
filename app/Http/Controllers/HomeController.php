<?php

namespace App\Http\Controllers;

use App\Models\Article\Article;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::take(3)
            ->inCategory($topCategoryId = 4)
            ->latest()
            ->get();

        return view('home', compact('articles'));
    }

    public function news()
    {
        $news = Article::latest()->get();

        return view('news.index', compact('news'));
    }
}

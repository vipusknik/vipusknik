<?php

namespace App\Http\Controllers;

use App\Models\Article\Article;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::take(3)
            ->inCategory(4)
            ->latest()
            ->get();

        return view('home', compact('articles'));
    }

    public function news()
    {
        $news = Article::orderBy('created_at')->get();

        return view('news.index', compact('news'));
    }
}

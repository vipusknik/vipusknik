<?php

namespace App\Http\Controllers;

use App\Models\Article\Article;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('created_at')->take(3)->get();

        return view('home', compact('articles'));
    }
}

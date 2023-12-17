<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::get();
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function getArticles()
    {
        $article = Article::get();
        return response()->json([
            'success' => true,
            'massage' => 'Succesfully getting all articles!',
            'listArticle' => $article,
        ]);
    }
}

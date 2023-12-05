<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;

class ArticleController extends Controller
{
    public function getArticles()
    {
        $article = Article::latest('date')->get();
        if (!$article) {
            return response()->json([
                'success' => false,
                'message' => 'No articles found...'
            ], 404);
        }
        return response()->json([
            'success' => true,
            'message' => 'Succesfully getting all articles!',
            'listArticle' => $article,
        ]);
    }

    public function getHomeArticles($total)
    {
        $article = Article::limit($total)->latest('date')->get();
        if (!$article) {
            return response()->json([
                'success' => false,
                'message' => 'No articles found...'
            ], 404);
        }
        return response()->json([
            'success' => true,
            'message' => 'Succesfully select articles!',
            'listArticle' => $article,
        ]);
    }

    public function showArticle($slug)
    {
        $article = Article::where('slug', $slug)->first();
        if (!$article) {
            return response()->json([
                'success' => false,
                'message' => 'No articles found...'
            ], 404);
        }
        return response()->json([
            'success' => true,
            'message' => 'Succesfully show article!',
            'listArticle' => $article,
        ]);
    }
}

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

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'date' => 'required',
            'content' => 'required',
            'image' => 'required|file|mimes:png,jpg,jpeg',
        ]);

        $uniqueSlug = $this->makeUniqueSlug($request->slug);
        $uploadedFile = $request->file('image');
        $originalName = $uploadedFile->getClientOriginalName();
        $thumbnailName = "$uniqueSlug" . '-' . $originalName;
        $thumbnailPath = $uploadedFile->storeAs('public/image', $thumbnailName);
        // $thumbnailPath = $request->file('thumbnail')->storeAs('public/thumbnail', "$uniqueSlug-" . $request->file('thumbnail')->getClientOriginalName());

        // Additional logic for processing content or images if needed

        $article = new Article();

        $article->title = $request->title;
        $article->slug = $uniqueSlug;
        $article->author = $request->author;
        $article->publisher = $request->publisher;
        $article->date = $request->date;
        $article->content = $request->content;
        $article->image = $thumbnailPath;

        $article->save();

        return redirect()->route('article.index')->with('success', 'Article berhasil ditambahkan.');
    }

    private function makeUniqueSlug($slug, $currentSlug = null)
    {
        $uniqueSlug = $slug;
        $counter = 2;

        while (Article::where('slug', $uniqueSlug)->whereNot('slug', $currentSlug)->exists()) {
            $uniqueSlug = $slug . '-' . $counter;
            $counter++;
        }

        return $uniqueSlug;
    }
}

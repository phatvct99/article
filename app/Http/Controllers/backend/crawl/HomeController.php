<?php

namespace App\Http\Controllers\backend\crawl;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('id', 'DESC')->paginate(20);
        ///dd($articles);
        return view('crawl.home')->withArticles($articles);
    }

    public function getArticleDetails($id)
    {
        $article = Article::find($id);

        return view('crawl.details')->withArticle($article);
    }

    public function getCategory($id)
    {
        $category = Category::find($id);

        $articles = Article::where('category_id', $id)->orderBy('id', 'DESC')->paginate(20);

        return view('crawl.category')->withArticles($articles)->withCategory($category);
    }
}

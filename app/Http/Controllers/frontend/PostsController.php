<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;

class PostsController extends Controller
{
    public function details1()
    {
        $posts = Article::orderBy('id', 'DESC')->paginate(9);
        $viewData = [
            'posts' => $posts,
            // 'query' => $posts->query()
        ];
        return view('frontend.posts.details1',$viewData)->withArticles($posts);
    }
    public function details2()
    {
        //$articles = Article::orderBy('id', 'DESC')->paginate(20);

        //return view('home')->withArticles($articles);
        return view('frontend.posts.details2');
    }

    public function getArticleDetails($id)
    {
        $posts = Article::find($id);
        $content = $posts->content;
        $pattern = '/<\s*(h.*?|p.*?|div.*?)[^>]*>([^<]*)<\s*\/\s*(h.*?|p|div)\s*>/';
        
        $regex = preg_match_all($pattern,$content,$result);
        $viewData = [
            'posts' => $posts,
            //'result' => $result,
            // 'query' => $posts->query()
        ];
        //dd($result[0]);

        return view('frontend.posts.postdetail',$viewData)->withArticle($posts);
    }

    public function getCategory($id)
    {
        $category = Category::find($id);

        $articles = Article::where('category_id', $id)->orderBy('id', 'DESC')->paginate(20);

        return view('category')->withArticles($articles)->withCategory($category);
    }
}

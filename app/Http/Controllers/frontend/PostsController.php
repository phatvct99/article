<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Constant;

class PostsController extends Controller
{
    public function boot()
    {
        Paginator::useBootstrap();
    }
    
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
        Article::find($id)->increment('total_view');
        $posts = Article::find($id);
        $posts_related = Article::orderBy('id', 'DESC')->paginate(5);

        $pattern = Constant::REGEX_CONTENT;

        $regex = preg_match_all($pattern,$posts->content,$result);
        $content = $result[0];

        $html = '<img src="../frontend/img/banner/banner2.jpg" alt="ad" class="img-fluid">';
        $replace = preg_replace($pattern, $html, $posts->content);

        //dd($content);
        $viewData = [
            'posts' => $posts,
            'content' => $content,
            'posts_related' => $posts_related,
            // 'html' => $html,
            // 'replace' => $replace
        ];

        return view('frontend.posts.postdetail',$viewData);
    }

    public function getCategory($id)
    {
        $category = Category::find($id);

        $articles = Article::where('category_id', $id)->orderBy('id', 'DESC')->paginate(20);

        return view('category')->withArticles($articles)->withCategory($category);
    }
}

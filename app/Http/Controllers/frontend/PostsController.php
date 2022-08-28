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
        return view('frontend.posts.details1', $viewData)->withArticles($posts);
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

        $content = SELF::replaceContent($posts);

        //dd($content);
        $viewData = [
            'posts' => $posts,
            'content' => $content,
            'posts_related' => $posts_related,
        ];

        return view('frontend.posts.postdetail', $viewData);
    }

    public function replaceContent($posts)
    {

        $patternScript = Constant::REGEX_SCRIPT;

        $patternStyle = Constant::REGEX_STYLE;

        $blank = '';

        if ($posts->content) {

            $replaceScript = preg_replace($patternScript, $blank, $posts->content);

            $replaceStyle = preg_replace($patternStyle, $blank, $replaceScript);
        } else {

            $replaceStyle = '<h2> No data.</h2>';
        }

        $result = $replaceStyle;
        return $result;
    }

    // public function getCategory($id)
    // {
    //     $category = Category::find($id);

    //     $articles = Article::where('category_id', $id)->orderBy('id', 'DESC')->paginate(20);

    //     return view('category')->withArticles($articles)->withCategory($category);
    // }
}

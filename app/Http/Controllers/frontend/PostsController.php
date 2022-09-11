<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Constant;
use App\Lib\Location;
use Illuminate\Support\Facades\DB;


class PostsController extends Controller
{

    public function getArticleByCategory($category)
    {
        $posts = DB::table('article')
            ->join('category', 'article.category_id', '=', 'category.id')
            ->select('article.title', 'article.excerpt', 'article.slug', 'article.updated_at')
            ->where('category.slug', $category)->where('article.dlt_flg', 0)
            ->orderBy('article.updated_at', 'DESC')
            ->paginate(10);

        $viewData = [
            'posts' => $posts,
        ];
        return view('frontend.posts.details1', $viewData)->withArticles($posts);
    }

    public function details2()
    {
        return view('frontend.posts.details2');
    }


    public function getArticleDetails($slug)
    {
        Article::where('slug', $slug)->increment('total_view');

        $posts = Article::where('slug', $slug)->get();
        foreach ($posts as $k => $post) {

            $content = SELF::replaceContent($post);
        }
        $posts_related = Article::orderBy('id', 'DESC')->paginate(15);

        // dd($posts);
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
}

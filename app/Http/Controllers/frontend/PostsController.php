<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Constant;
use App\Lib\Location;
use Illuminate\Support\Facades\DB;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Exception;


class PostsController extends Controller
{

    public function getArticleByCategory($category)
    {
        try {
            $posts = DB::table('article')
                ->join('category', 'article.category_id', '=', 'category.id')
                ->select(
                    'article.title',
                    'article.excerpt',
                    'article.slug',
                    'article.updated_at',
                    'article.image',
                    'category.title as title_category',
                    'category.keyword as keyword_category',
                    'category.description as description_category',
                    'category.slug as slug_category'
                )
                ->where('category.slug', $category)
                ->where('article.dlt_flg', 0)
                ->where('article.status', 1)
                ->orderBy('article.updated_at', 'DESC')
                ->paginate(15);

            foreach ($posts as $k => $post) {
                //SEO
                SEOMeta::setTitle('Tin tức hay ' . $post->title_category);
                SEOMeta::setDescription($post->description_category);

                OpenGraph::setDescription($post->keyword_category);
                OpenGraph::setTitle('Tin tức hay ' . $post->title_category);
                OpenGraph::setUrl('https://kinhtez.com/danh-muc-' . $post->slug_category);
            }

            SEOMeta::addKeyword($post->keyword_category);

            $viewData = [
                'posts' => $posts,
            ];

            if ($category == 'cong-nghe' || $category == 'crypto') {

                return view('frontend.posts.crypto', $viewData);
            }

            return view('frontend.posts.details1', $viewData);
        } catch (Exception $e) {

            return response()->view('frontend.container.404', [], 404);
        }
    }

    public function details2()
    {
        return view('frontend.posts.details2');
    }


    public function getArticleDetails($slug)
    {
        try {
            Article::where('slug', $slug)->increment('total_view');
            $posts = Article::where('slug', $slug)->get();
            foreach ($posts as $k => $post) {

                $content = SELF::replaceContent($post);
                //SEO
                SEOMeta::setTitle($post->title);
                SEOMeta::addMeta('article:published_time', $post->updated_at->toW3CString(), 'property');
                SEOMeta::setDescription($post->excerpt);
                SEOMeta::addKeyword($post->keyword);
                OpenGraph::setDescription($post->excerpt);
                OpenGraph::setTitle($post->title);
                OpenGraph::setUrl('https://kinhtez.com/tin-tuc-' . $post->slug);
                OpenGraph::addImage(['url' => 'https://kinhtez.com' . $post->image, 'size' => 300]);
                OpenGraph::addImage('https://kinhtez.com' . $post->image, ['height' => 320, 'width' => 500]);
            }
            // dd($posts);
            $posts_related = Article::where('category_id', $post->category_id)->orderBy('id', 'DESC')->paginate(15);

            // dd($posts);
            $viewData = [
                'posts' => $posts,
                'content' => $content,
                'posts_related' => $posts_related,
            ];
            if ($post->category_id == '4') {

                return view('frontend.posts.postdetail-crypto', $viewData);
            }
            return view('frontend.posts.postdetail', $viewData);
        } catch (Exception $e) {

            return response()->view('frontend.container.404', [], 404);
        }
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

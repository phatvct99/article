<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Lib\LocationIp;
use Jenssegers\Agent\Agent;
use App\Models\Category;
use App\Models\Article;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $location = new LocationIp();
        $location->getLocation($request);

        $posts = DB::table('article')
            ->join('category', 'article.category_id', '=', 'category.id')
            ->select('article.title', 'article.excerpt', 'article.slug', 'article.updated_at', 'article.category_id')
            ->where('article.dlt_flg', 0)
            ->orderBy('article.updated_at', 'DESC')
            ->paginate(10);

        $postBusiness = Article::where('dlt_flg', 0)->where('category_id',1)->orderBy('updated_at', 'DESC')->take(3)->get();
        $postFinance = Article::where('dlt_flg', 0)->where('category_id',2)->orderBy('updated_at', 'DESC')->take(3)->get();
        $postLand = Article::where('dlt_flg', 0)->where('category_id',3)->orderBy('updated_at', 'DESC')->take(3)->get();
        $postTech = Article::where('dlt_flg', 0)->where('category_id',4)->orderBy('updated_at', 'DESC')->take(3)->get();
        $postSociety = Article::where('dlt_flg', 0)->where('category_id',5)->orderBy('updated_at', 'DESC')->take(3)->get();
        $postCrypto = Article::where('dlt_flg', 0)->where('category_id',6)->orderBy('updated_at', 'DESC')->take(3)->get();

        $viewData = [
            'posts' => $posts,
            'postBusiness' => $postBusiness,
            'postFinance' => $postFinance,
            'postLand' => $postLand,
            'postTech' => $postTech,
            'postSociety' => $postSociety,
            'postCrypto' => $postCrypto,
        ];
        // dd($postAll);
        return view('frontend.index', $viewData);
    }

    public function getArticleByCategory($category)
    {
        $posts = DB::table('article')
            ->join('category', 'article.category_id', '=', 'category.id')
            ->select('article.title', 'article.excerpt', 'article.slug', 'article.updated_at')
            ->where('category.slug', $category)->where('article.dlt_flg', 0)
            ->orderBy('article.updated_at', 'DESC')
            ->take(4)->get();
    }
}

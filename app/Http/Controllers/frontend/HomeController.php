<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Lib\LocationIp;
use Jenssegers\Agent\Agent;
use App\Models\Category;
use App\Models\Article;
use Illuminate\Support\Facades\DB;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // $location = new LocationIp();
        // $location->getLocation($request);

        $posts = DB::table('article')
            ->join('category', 'article.category_id', '=', 'category.id')
            ->select('article.title', 'article.excerpt', 'article.slug', 'article.updated_at', 'article.category_id', 'article.image')
            ->where('article.dlt_flg', 0)
            ->where('article.status', 1)
            ->orderBy('article.updated_at', 'DESC')
            ->paginate(30);

        $artilces = '';
        if ($request->ajax()) {
            foreach ($posts as $post) {

                $artilces .= '<div class="row politics">
                                    <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                                        <div class="media media-none--lg mb-30">
                                            <div class="position-relative width-40">
                                                <a href="" class="img-opacity-hover">
                                                    <img src="' . $post->image . '"  class="thumbnail-image">
                                                </a>
                                        </div>
                                        <div class="media-body p-mb-none-child media-margin30">
                                            <h3 class="title-semibold-dark size-lg mb-15">
                                                <a href="/tin-tuc-' . $post->slug . '">' . $post->title . '</a>
                                            </h3>
                                            <article>
                                                <p>' . $post->excerpt . '</p>
                                            </article>
                                        </div>
                                    </div>
                                </div>
                            </div>';
            }
            return $artilces;
        }


        $postTop = Article::select('title', 'name', 'image', 'slug')->where('article.status', 1)->where('dlt_flg', 0)->orderBy('total_view', 'DESC')->take(1)->get();

        $post_new = DB::table('article')
            ->select('article.title', 'article.excerpt', 'article.slug', 'article.updated_at', 'article.category_id', 'article.image')
            ->where('article.dlt_flg', 0)
            ->where('article.status', 1)
            ->orderBy('article.total_view', 'DESC')
            ->take(4)->get();
        $postBusiness = Article::select('title', 'name', 'image', 'slug')->where('dlt_flg', 0)->where('category_id', 1)->orderBy('updated_at', 'DESC')->take(3)->get();
        $postFinance = Article::select('title', 'name', 'image', 'slug')->where('dlt_flg', 0)->where('category_id', 2)->orderBy('updated_at', 'DESC')->take(3)->get();
        $postLand = Article::select('title', 'name', 'image', 'slug')->where('dlt_flg', 0)->where('category_id', 3)->orderBy('updated_at', 'DESC')->take(3)->get();
        $postTech = Article::select('title', 'name', 'image', 'slug')->where('dlt_flg', 0)->where('category_id', 4)->orderBy('updated_at', 'DESC')->take(3)->get();
        $postSociety = Article::select('title', 'name', 'image', 'slug')->where('dlt_flg', 0)->where('category_id', 5)->orderBy('updated_at', 'DESC')->take(3)->get();
        $postCrypto = Article::select('title', 'name', 'image', 'slug')->where('dlt_flg', 0)->where('category_id', 6)->orderBy('updated_at', 'DESC')->take(3)->get();

        // SEO
        SEOMeta::setTitle('KinhteZ - Thông tin kinh doanh, Doanh nhân, Kiến thức tài chính, Bất động sản, Công nghệ, Crypto, Blockchain, Xã hội');
        SEOMeta::setDescription('Phân tích chuyên sâu về lĩnh vực kinh doanh, bất động sản, tài chính, công nghệ, tiền ảo. Các câu chuyện thú vị về các kinh tế Việt Nam và thế giới.');
        SEOMeta::addKeyword('Tra cứu mã số thuế, Tra cứu thông tin doanh nghiệp, Tra cứu doanh nghiêp, Tra cứu công ty, Hồ Sơ công ty, MST công ty, KinhteZ');
        OpenGraph::setDescription('Tra cứu mã số thuế của doanh nghiệp, hồ sơ công ty tra cứu mã số thuế cá nhân, tra cứu mã số thuế trên facebook, zalo. Tin tức về thuế, kế toán và doanh nghiệp.');
        OpenGraph::setTitle('Kinh tế mới, câu chuyện kinh doanh, tin bất động sản, thị trường chứng khoản, tiền ảo, tin công nghệ mới nhất, chuyển đổi số, genZ | KinhteZ');
        OpenGraph::setUrl('https://kinhtez.com/');
        OpenGraph::addImage('https://kinhtez.com/frontend/img/logo/logo-kinhtez.png', ['height' => 42, 'width' => 130]);

        // dd($postTop);
        $viewData = [
            'posts' => $posts,
            'post_new' => $post_new,
            'postBusiness' => $postBusiness,
            'postFinance' => $postFinance,
            'postLand' => $postLand,
            'postTech' => $postTech,
            'postSociety' => $postSociety,
            'postCrypto' => $postCrypto,
            'postTop' => $postTop,
        ];
        $agent = new Agent();
        $agent->is('iPhone');
        $device = $agent->platform();
        // dd($device);
        return view('frontend.index', $viewData);
    }
}

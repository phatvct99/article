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
use Exception;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // phat 123
        try {
            $posts = DB::table('article')
                ->join('category', 'article.category_id', '=', 'category.id')
                ->select('article.title', 'article.excerpt', 'article.slug', 'article.updated_at', 'article.category_id', 'article.image')
                ->where('article.dlt_flg', 0)
                ->where('article.status', 1)
                ->orderBy('article.updated_at', 'DESC')
                ->paginate(20);

            $artilces = '';
            if ($request->ajax()) {
                foreach ($posts as $post) {

                    $artilces .= '<div class="row politics">
                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                                            <div class="media media-none--lg mb-30">
                                                <div class="position-relative width-40">
                                                    <a href="/tin-tuc-' . $post->slug . '" class="img-opacity-hover">
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
            $postBusiness = Article::select('title', 'name', 'image', 'slug')->where('article.status', 1)->where('dlt_flg', 0)->where('category_id', 1)->orderBy('updated_at', 'DESC')->take(3)->get();
            $postFinance = Article::select('title', 'name', 'image', 'slug')->where('article.status', 1)->where('dlt_flg', 0)->where('category_id', 2)->orderBy('updated_at', 'DESC')->take(3)->get();
            $postLand = Article::select('title', 'name', 'image', 'slug')->where('article.status', 1)->where('dlt_flg', 0)->where('category_id', 3)->orderBy('updated_at', 'DESC')->take(3)->get();
            $postTech = Article::select('title', 'name', 'image', 'slug')->where('article.status', 1)->where('dlt_flg', 0)->where('category_id', 4)->orderBy('updated_at', 'DESC')->take(3)->get();
            $postSociety = Article::select('title', 'name', 'image', 'slug')->where('article.status', 1)->where('dlt_flg', 0)->where('category_id', 5)->orderBy('updated_at', 'DESC')->take(3)->get();
            $postCrypto = Article::select('title', 'name', 'image', 'slug')->where('article.status', 1)->where('dlt_flg', 0)->where('category_id', 6)->orderBy('updated_at', 'DESC')->take(3)->get();

            // SEO
            SEOMeta::setTitle('KinhteZ - Th??ng tin kinh doanh, Doanh nh??n, Ki???n th???c t??i ch??nh, B???t ?????ng s???n, C??ng ngh???, Crypto, Blockchain, X?? h???i');
            SEOMeta::setDescription('Ph??n t??ch chuy??n s??u v??? l??nh v???c kinh doanh, b???t ?????ng s???n, t??i ch??nh, c??ng ngh???, ti???n ???o. C??c c??u chuy???n th?? v??? v??? c??c kinh t??? Vi???t Nam v?? th??? gi???i.');
            SEOMeta::addKeyword('Tra c???u m?? s??? thu???, Tra c???u th??ng tin doanh nghi???p, Tra c???u doanh nghi??p, Tra c???u c??ng ty, H??? S?? c??ng ty, MST c??ng ty, KinhteZ');
            OpenGraph::setDescription('Tra c???u m?? s??? thu??? c???a doanh nghi???p, h??? s?? c??ng ty tra c???u m?? s??? thu??? c?? nh??n, tra c???u m?? s??? thu??? tr??n facebook, zalo. Tin t???c v??? thu???, k??? to??n v?? doanh nghi???p.');
            OpenGraph::setTitle('Kinh t??? m???i, c??u chuy???n kinh doanh, tin b???t ?????ng s???n, th??? tr?????ng ch???ng kho???n, ti???n ???o, tin c??ng ngh??? m???i nh???t, chuy???n ?????i s???, genZ | KinhteZ');
            OpenGraph::setUrl('https://kinhtez.com/');
            OpenGraph::addImage('https://kinhtez.com/frontend/img/logo/logo-kinhtez.png', ['height' => 42, 'width' => 130]);

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
        } catch (Exception $e) {

            return response()->view('frontend.container.404', [], 404);
        }
    }
}

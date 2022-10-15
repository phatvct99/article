@extends('layouts.frontend')
@section ('seo')
{!! SEOMeta::generate() !!}
{!! OpenGraph::generate() !!}
@endsection
@section ('content')
<section class="bg-body section-space-less30">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 mb-30">
                <div class="news-details-layout1">
                    @if(isset($posts))
                        <div class="position-relative mb-30">
                        @if((new \Jenssegers\Agent\Agent())->platform() == 'AndroidOS' )
                        <a href="https://trackmobi.asia/ZnPC5Qu2" target="_blank">
                            <img src="/frontend/img/ads/banner-555x320.jpg" alt="news-details" class="img-ads-top">
                        </a>
                        @elseif((new \Jenssegers\Agent\Agent())->platform() == 'iOS' )
                            <a href="https://shorten.asia/UBPExYGq" target="_blank">
                            <img src="/frontend/img/ads/banner-555x320.jpg" alt="news-details" class="img-ads-top">
                            </a>
                        @else
                            <a href="https://mobilebanking.mbbank.com.vn:8443/referral/referred.html?referral_code=Z61LQN7ZUV171BDYCZPF" target="_blank">
                            <img src="/frontend/img/ads/banner-555x320.jpg" alt="news-details" class="img-ads-top">
                            </a>
                        @endif
                        </div>
                        @foreach ($posts as $k => $post)
                        <h1 class="title-semibold-dark size-c30">{{$post->title}}</h1>
                        @endforeach
                    <div class="article-content">
                        @if(isset($content))
                        {!! $content !!}
                        @endif
                    </div>
                    @endif
                    <div class="post-share-area mb-40 item-shadow-1">
                        <p>You can share this post!</p>
                        <ul class="social-default item-inline">
                            <li>
                                <a href="#" class="facebook">
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="twitter">
                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="google">
                                    <i class="fa fa-google-plus" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="pinterest">
                                    <i class="fa fa-pinterest" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="rss">
                                    <i class="fa fa-rss" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="linkedin">
                                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    @if((new \Jenssegers\Agent\Agent())->isDesktop())
                    <div class="ne-banner-layout1 mb-50 mt-20-r text-center">
                        @if((new \Jenssegers\Agent\Agent())->platform() == 'AndroidOS' )
                        <a href="https://trackmobi.asia/ZnPC5Qu2" target="_blank">
                            <img src="/frontend/img/ads/ads1.gif" alt="ad" class="thumbnail-image" loading="lazy">
                        </a>
                        @elseif((new \Jenssegers\Agent\Agent())->platform() == 'iOS' )
                            <a href="https://shorten.asia/UBPExYGq" target="_blank">
                                <img src="/frontend/img/ads/ads1.gif" alt="ad" class="thumbnail-image" loading="lazy">
                            </a>
                        @else
                            <a href="https://mobilebanking.mbbank.com.vn:8443/referral/referred.html?referral_code=Z61LQN7ZUV171BDYCZPF" target="_blank">
                                <img src="/frontend/img/ads/ads1.gif" alt="ad" class="thumbnail-image" loading="lazy">
                            </a>
                        @endif
                    </div>
                    @endif
                    @if((new \Jenssegers\Agent\Agent())->isMobile())
                    <div class="sidebar-box image-ads">
                        <div class="ne-banner-layout1 text-center">
                            @if((new \Jenssegers\Agent\Agent())->platform() == 'AndroidOS' )
                            <a href="https://trackmobi.asia/ZnPC5Qu2" target="_blank">
                                <img src="/frontend/img/ads/ads4.gif" alt="ad" class="thumbnail-image" loading="lazy">
                            </a>
                            @elseif((new \Jenssegers\Agent\Agent())->platform() == 'iOS' )
                                <a href="https://shorten.asia/UBPExYGq" target="_blank">
                                    <img src="/frontend/img/ads/ads4.gif" alt="ad" class="thumbnail-image" loading="lazy">
                                </a>
                            @else
                                <a href="https://mobilebanking.mbbank.com.vn:8443/referral/referred.html?referral_code=Z61LQN7ZUV171BDYCZPF" target="_blank">
                                    <img src="/frontend/img/ads/ads4.gif" alt="ad" class="thumbnail-image" loading="lazy">
                                </a>
                            @endif
                        </div>
                    </div>
                    <br>
                    @endif
                    <div class="col-lg-12 col-md-12">
                        <div class="row">
                            @if(isset($posts_related))
                            @foreach($posts_related as $post)
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="media media-none--lg mb-30">
                                    <div class="position-relative width-40">
                                        <a href="{{ route('post-details',$post ->slug)}}">
                                        @if(!empty($post->image))
                                        <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="thumbnail-image">
                                        @else
                                        <img src="frontend/img/news/news141.jpg" alt="{{ $post->title }}" class="thumbnail-image">
                                        @endif
                                        </a>
                                    </div>
                                    <div class="media-body p-mb-none-child media-margin30">
                                        <h3 class="title-semibold-dark size-lg mb-15">
                                        @if(isset($post->name))
                                        <a href="{{ route('post-details',$post ->slug)}}">{{ $post->name }}</a>
                                        @else
                                        <a href="{{ route('post-details',$post ->slug)}}">{{ $post->title }}</a>
                                        @endif
                                        </h3>
                                        @if(isset($post->excerpt))
                                            <article>
                                                <p>{{ $post->excerpt }}</p>
                                            </article>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="ne-sidebar sidebar-break-md col-lg-4 col-md-12">

                <div class="sidebar-box">
                    <div class="ne-banner-layout1 text-center">
                        @if((new \Jenssegers\Agent\Agent())->platform() == 'AndroidOS' )
                        <a href="https://trackmobi.asia/ZnPC5Qu2" target="_blank">
                            <img src="/frontend/img/ads/ads6.jpg" alt="ad" class="thumbnail-image">
                        </a>
                        @elseif((new \Jenssegers\Agent\Agent())->platform() == 'iOS' )
                            <a href="https://shorten.asia/UBPExYGq" target="_blank">
                                <img src="/frontend/img/ads/ads6.jpg" alt="ad" class="thumbnail-image">
                            </a>
                        @else
                            <a href="https://mobilebanking.mbbank.com.vn:8443/referral/referred.html?referral_code=Z61LQN7ZUV171BDYCZPF" target="_blank">
                                <img src="/frontend/img/ads/ads6.jpg" alt="ad" class="thumbnail-image">
                            </a>
                        @endif
                    </div>
                </div>

                <div class="sidebar-box image-ads">
                    <div class="ne-banner-layout1 text-center">
                        @if((new \Jenssegers\Agent\Agent())->platform() == 'AndroidOS' )
                            <a href="https://trackmobi.asia/ZnPC5Qu2" target="_blank">
                                <img src="/frontend/img/ads/ads4.gif" alt="ad" class="thumbnail-image" loading="lazy">
                            </a>
                        @elseif((new \Jenssegers\Agent\Agent())->platform() == 'iOS' )
                            <a href="https://shorten.asia/UBPExYGq" target="_blank">
                                <img src="/frontend/img/ads/ads4.gif" alt="ad" class="thumbnail-image" loading="lazy">
                            </a>
                        @else
                            <a href="https://mobilebanking.mbbank.com.vn:8443/referral/referred.html?referral_code=Z61LQN7ZUV171BDYCZPF" target="_blank">
                                <img src="/frontend/img/ads/ads4.gif" alt="ad" class="thumbnail-image" loading="lazy">
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="banner-ads-bottom">
        <div class="ne-banner-layout1 text-center">
            @if((new \Jenssegers\Agent\Agent())->platform() == 'AndroidOS' )
            <a href="https://trackmobi.asia/ZnPC5Qu2" target="_blank">
                <img src="/frontend/img/ads/ads1.gif" alt="ad" class="thumbnail-image" loading="lazy">
            </a>
            @elseif((new \Jenssegers\Agent\Agent())->platform() == 'iOS' )
                <a href="https://shorten.asia/UBPExYGq" target="_blank">
                    <img src="/frontend/img/ads/ads1.gif" alt="ad" class="thumbnail-image" loading="lazy">
                </a>
            @else
                <a href="https://mobilebanking.mbbank.com.vn:8443/referral/referred.html?referral_code=Z61LQN7ZUV171BDYCZPF" target="_blank">
                    <img src="/frontend/img/ads/ads1.gif" alt="ad" class="thumbnail-image" loading="lazy">
                </a>
            @endif
        </div>
    </div>
</section>

@endsection

@section('js')

<script>
window.onscroll = function() {myFunction()};
function myFunction() {
    if( !/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
        var footerElement = document.getElementById("footerPost");
        var footerPosition = footerElement.offsetTop;
        if (document.documentElement.scrollTop > 300 && document.documentElement.scrollTop < (footerPosition- 900) ) {
        document.querySelector(".image-ads").style.position = "fixed";
        } else {
        document.querySelector(".image-ads").style.position = "";
        }
    }
    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
        if (document.body.scrollTop > 1000 || document.documentElement.scrollTop > 1000) {
            document.getElementById("banner-ads-bottom").style.top = "60px";
            document.getElementById("banner-ads-bottom").style.position = "fixed";
        } else {
            document.getElementById("banner-ads-bottom").style.top = "-60px";
        }
    }
}
</script>
@endsection

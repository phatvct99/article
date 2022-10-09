@extends('layouts.frontend')
@section ('content')
<!-- Author Post Page Area Start Here -->
<section class="bg-body section-space-less30">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    @if(isset($posts))
                    @foreach($posts as $post)
                    <div class="col-sm-6 col-12">
                        <div class="mb-30">
                            <div class="position-relative mb-20">
                                <a class="img-opacity-hover" href="{{ route('post-details',$post ->slug)}}">
                                    @if(!empty($post->image))
                                    <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="img-fluid width-100">
                                    @else
                                    <img src="frontend/img/news/news141.jpg" alt="{{ $post->title }}" class="img-fluid">
                                    @endif
                                </a>
                            </div>
                            <div class="post-date-dark">
                                <ul>
                                    <li>
                                        <span>by</span>
                                        <a href="/">KinhteZ</a>
                                    </li>
                                    <li>
                                        <span>
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                        </span>{{ \Carbon\Carbon::parse($post->updated_at)->format('d/m/Y') }}
                                    </li>
                                </ul>
                            </div>
                            <h3 class="title-medium-dark size-lg mb-none">
                                @if(isset($post->name))
                                <a href="{{ route('post-details',$post ->slug)}}">{{ $post->name }}</a>
                                @else
                                <a href="{{ route('post-details',$post ->slug)}}">{{ $post->title }}</a>
                                @endif
                            </h3>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
                <div class="row mt-20-r mb-30">
                    <div class="col-sm-6 col-12">
                        <div class="pagination-btn-wrapper text-center--xs mb15--xs">
                        {{ $posts->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="ne-sidebar sidebar-break-md col-lg-4 col-md-12">
                <div class="sidebar-box image-ads">
                    <div class="ne-banner-layout1 text-center">
                        @if((new \Jenssegers\Agent\Agent())->platform() == 'AndroidOS' )
                        <a href="https://trackmobi.asia/ZnPC5Qu2" target="_blank">
                            <img src="/frontend/img/ads/ads-binance-right.gif" alt="ad" class="img-fluid" loading="lazy">
                        </a>
                        @elseif((new \Jenssegers\Agent\Agent())->platform() == 'iOS' )
                            <a href="https://shorten.asia/UBPExYGq" target="_blank">
                                <img src="/frontend/img/ads/ads-binance-right.gif" alt="ad" class="img-fluid" loading="lazy">
                            </a>
                        @else
                            <a href="https://mobilebanking.mbbank.com.vn:8443/referral/referred.html?referral_code=Z61LQN7ZUV171BDYCZPF" target="_blank">
                                <img src="/frontend/img/ads/ads-binance-right.gif" alt="ad" class="img-fluid" loading="lazy">
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
                <img src="/frontend/img/ads/ads-binance-top.gif" alt="ad" class="img-fluid" loading="lazy">
            </a>
            @elseif((new \Jenssegers\Agent\Agent())->platform() == 'iOS' )
                <a href="https://shorten.asia/UBPExYGq" target="_blank">
                    <img src="/frontend/img/ads/ads-binance-top.gif" alt="ad" class="img-fluid" loading="lazy">
                </a>
            @else
                <a href="https://mobilebanking.mbbank.com.vn:8443/referral/referred.html?referral_code=Z61LQN7ZUV171BDYCZPF" target="_blank">
                    <img src="/frontend/img/ads/ads-binance-top.gif" alt="ad" class="img-fluid" loading="lazy">
                </a>
            @endif
        </div>
    </div>
</section>
<!-- Author Post Page Area End Here -->
@endsection
@section('js')
<script>
window.onscroll = function() {myFunction()};
console.log(window.scrollY)
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
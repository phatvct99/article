@extends('layouts.frontend')
@section ('content')      

<!-- Breadcrumb Area End Here -->
<!-- Post Style 1 Page Area Start Here -->
<section class="bg-body section-space-less30">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    @if(isset($posts))
                    @foreach($posts as $post)
                    <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                        <div class="media media-none--lg mb-30">
                            <div class="position-relative width-40">
                                <a href="{{ route('post-details',$post ->slug)}}">
                                    @if(!empty($post->image))
                                    <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="img-fluid">
                                    @else
                                    <img src="frontend/img/news/news141.jpg" alt="{{ $post->title }}" class="img-fluid">
                                    @endif
                                </a>
                                
                            </div>
                            <div class="media-body p-mb-none-child media-margin30">
                                <div class="post-date-dark">
                                    <ul>
                                        <li>
                                            <span>by</span>
                                            <a href="single-news-1.html">KinhteZ</a>
                                        </li>
                                        <li>
                                            <span>
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                            </span>{{ \Carbon\Carbon::parse($post->updated_at)->format('d/m/Y') }}
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="title-semibold-dark size-lg mb-15">
                                    @if(isset($post->name))
                                    <a href="{{ route('post-details',$post ->slug)}}">{{ $post->name }}</a>
                                    @else
                                    <a href="{{ route('post-details',$post ->slug)}}">{{ $post->title }}</a>
                                    @endif
                                </h3>
                                @if(!empty($post->excerpt))
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
                            <img src="/frontend/img/ads/ads4.gif" alt="ad" class="img-fluid" loading="lazy">
                        </a>
                        @elseif((new \Jenssegers\Agent\Agent())->platform() == 'iOS' )
                            <a href="https://shorten.asia/UBPExYGq" target="_blank">
                                <img src="/frontend/img/ads/ads4.gif" alt="ad" class="img-fluid" loading="lazy">
                            </a>
                        @else
                            <a href="https://mobilebanking.mbbank.com.vn:8443/referral/referred.html?referral_code=Z61LQN7ZUV171BDYCZPF" target="_blank">
                                <img src="/frontend/img/ads/ads4.gif" alt="ad" class="img-fluid" loading="lazy">
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
                <img src="/frontend/img/ads/ads1.gif" alt="ad" class="img-fluid" loading="lazy">
            </a>
            @elseif((new \Jenssegers\Agent\Agent())->platform() == 'iOS' )
                <a href="https://shorten.asia/UBPExYGq" target="_blank">
                    <img src="/frontend/img/ads/ads1.gif" alt="ad" class="img-fluid" loading="lazy">
                </a>
            @else
                <a href="https://mobilebanking.mbbank.com.vn:8443/referral/referred.html?referral_code=Z61LQN7ZUV171BDYCZPF" target="_blank">
                    <img src="/frontend/img/ads/ads1.gif" alt="ad" class="img-fluid" loading="lazy">
                </a>
            @endif
        </div>
    </div>
</section>
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
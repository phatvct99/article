@extends('layouts.frontend')
@section ('seo')
{!! SEOMeta::generate() !!}
{!! OpenGraph::generate() !!}
@endsection
@section ('content')
<!-- Top Story Area Start Here -->
<section class="bg-body section-space-default">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="mb-20-r ne-isotope">
                    <div class="Container">
                        <div class="row politics">
                            <div class="col-md-6 col-sm-12">
                                @if(!empty($postTop))
                                @foreach($postTop as $post)
                                <div class="img-overlay-70 img-scale-animate mb-30">
                                    <a href="{{ route('post-details',$post ->slug)}}">
                                        @if(!empty($post->image))
                                        @if((new \Jenssegers\Agent\Agent())->isMobile())
                                        <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="thumbnail-image width-100">
                                        @else
                                        <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" style="width:350px; height:506px;" class="thumbnail-image">
                                        @endif
                                        @else
                                        <img src="/frontend/img/news/news5.jpg" alt="news" class="thumbnail-image width-100">
                                        @endif
                                    </a>
                                    <div class="mask-content-lg">
                                        <h2 class="title-medium-light size-lg">
                                            @if(!empty($post->name))
                                            <a href="{{ route('post-details',$post ->slug)}}">{{ $post->name }} </a>
                                            @else
                                            <a href="{{ route('post-details',$post ->slug)}}">{{ $post->title }}</a>
                                            @endif
                                        </h2>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                            <div class="col-md-6 col-sm-12">
                                @if(!empty($post_new))
                                @foreach($post_new as $post)
                                <div class="media mb-30">
                                    <a class="width38-lg width40-md img-opacity-hover" href="{{ route('post-details',$post ->slug)}}">
                                        @if(!empty($post->image))
                                        <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" style="width:144px; height:101px;" class="thumbnail-image">
                                        @else
                                        <img src="/frontend/img/news/news6.jpg" alt="{{ $post->title }}" class="thumbnail-image">
                                        @endif
                                    </a>
                                    <div class="media-body">
                                        <h3 class="title-medium-dark size-md mb-none">
                                            @if(!empty($post->name))
                                            <a href="{{ route('post-details',$post ->slug)}}">{{ $post->name }} </a>
                                            @else
                                            <a href="{{ route('post-details',$post ->slug)}}">{{ $post->title }}</a>
                                            @endif
                                        </h3>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="ne-sidebar sidebar-break-md col-lg-4 col-md-12">

                <div class="sidebar-box">
                    <div class="ne-banner-layout1 text-center">
                        @if((new \Jenssegers\Agent\Agent())->platform() == 'AndroidOS' )
                        <a href="https://trackmobi.asia/ZnPC5Qu2" target="_blank">
                            <img src="../frontend/img/ads/ads6.jpg" alt="ad" class="thumbnail-image">
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
                <div class="newsletter-area bg-primary" style="">
                    <h2 class="title-medium-light size-xl">Tra c???u th??ng tin doanh nghi???p</p>
                        <form action="{{ route('search') }}" method="GET">
                            <div class="input-group stylish-input-group">
                                <input type="text" name="search" placeholder="T??m ki???m" class="form-control" value={{old('search')}}>
                                <span class="input-group-addon">
                                    <button type="submit">
                                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-body section-space-less30">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12">
                @if(!empty($postBusiness))
                <div class="topic-border color-cutty-sark mb-30 width-100">
                    <div class="topic-box-lg color-cutty-sark">Kinh doanh</div>
                </div>
                @foreach ($postBusiness as $post)
                @if ($loop->first)
                <div class="img-overlay-70 img-scale-animate position-relative mb-20">
                    <div class="mask-content-sm">
                        <h3 class="title-medium-light">
                            @if(!empty($post->name))
                            <a href="{{ route('post-details',$post ->slug)}}">{{ $post->name }} </a>
                            @else
                            <a href="{{ route('post-details',$post ->slug)}}">{{ $post->title }}</a>
                            @endif
                        </h3>
                    </div>
                    @if(!empty($post->image))
                    <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="thumbnail-image" style="height: 215px;">
                    @else
                    <img src="/frontend/img/news/news19.jpg" alt="{{ $post->title }}" class="thumbnail-image">
                    @endif
                </div>
                @endif
                <div class="media mb-30">
                    <a class="img-opacity-hover" href="{{ route('post-details',$post ->slug)}}">
                        @if(!empty($post->image))
                        <img src="{{ asset($post->image) }}" loading="lazy" alt="{{ $post->title }}" style="width:144px; height:101px;" class="thumbnail-image">
                        @else
                        <img src="/frontend/img/news/news6.jpg" alt="{{ $post->title }}" class="thumbnail-image">
                        @endif
                    </a>
                    <div class="media-body">
                        <h3 class="title-medium-dark size-md mb-none">
                            @if(!empty($post->name))
                            <a href="{{ route('post-details',$post ->slug)}}">{{ $post->name }} </a>
                            @else
                            <a href="{{ route('post-details',$post ->slug)}}">{{ $post->title }}</a>
                            @endif
                        </h3>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
            <div class="col-lg-4 col-md-12">
                @if(!empty($postFinance))
                <div class="topic-border color-cutty-sark mb-30 width-100">
                    <div class="topic-box-lg color-cutty-sark">T??i ch??nh</div>
                </div>
                @foreach ($postFinance as $post)
                @if ($loop->first)
                <div class="img-overlay-70 img-scale-animate position-relative mb-20">
                    <div class="mask-content-sm">
                        <h3 class="title-medium-light">
                            @if(!empty($post->name))
                            <a href="{{ route('post-details',$post ->slug)}}">{{ $post->name }} </a>
                            @else
                            <a href="{{ route('post-details',$post ->slug)}}">{{ $post->title }}</a>
                            @endif
                        </h3>
                    </div>
                    @if(!empty($post->image))
                    <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="thumbnail-image" style="height: 215px;">
                    @else
                    <img src="/frontend/img/news/news19.jpg" alt="{{ $post->title }}" class="thumbnail-image">
                    @endif
                </div>
                @endif
                <div class="media mb-30">
                    <a class="img-opacity-hover" href="{{ route('post-details',$post ->slug)}}">
                        @if(!empty($post->image))
                        <img src="{{ asset($post->image) }}" loading="lazy" alt="{{ $post->title }}" style="width:144px; height:101px;" class="thumbnail-image">
                        @else
                        <img src="/frontend/img/news/news6.jpg" alt="{{ $post->title }}" class="thumbnail-image">
                        @endif
                    </a>
                    <div class="media-body">
                        <h3 class="title-medium-dark size-md mb-none">
                            @if(!empty($post->name))
                            <a href="{{ route('post-details',$post ->slug)}}">{{ $post->name }} </a>
                            @else
                            <a href="{{ route('post-details',$post ->slug)}}">{{ $post->title }}</a>
                            @endif
                        </h3>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
            <div class="col-lg-4 col-md-12">
                @if(!empty($postLand))
                <div class="topic-border color-cutty-sark mb-30 width-100">
                    <div class="topic-box-lg color-cutty-sark">B???t ?????ng s???n</div>
                </div>
                @foreach ($postLand as $post)
                @if ($loop->first)
                <div class="img-overlay-70 img-scale-animate position-relative mb-20">
                    <div class="mask-content-sm">
                        <h3 class="title-medium-light">
                            @if(!empty($post->name))
                            <a href="{{ route('post-details',$post ->slug)}}">{{ $post->name }} </a>
                            @else
                            <a href="{{ route('post-details',$post ->slug)}}">{{ $post->title }}</a>
                            @endif
                        </h3>
                    </div>
                    @if(!empty($post->image))
                    <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="thumbnail-image" style="height: 215px;">
                    @else
                    <img src="/frontend/img/news/news19.jpg" alt="{{ $post->title }}" class="thumbnail-image">
                    @endif
                </div>
                @endif
                <div class="media mb-30">
                    <a class="img-opacity-hover" href="{{ route('post-details',$post ->slug)}}">
                        @if(!empty($post->image))
                        <img src="{{ asset($post->image) }}" loading="lazy" alt="{{ $post->title }}" style="width:144px; height:101px;" class="thumbnail-image">
                        @else
                        <img src="/frontend/img/news/news6.jpg" alt="{{ $post->title }}" class="thumbnail-image">
                        @endif
                    </a>
                    <div class="media-body">
                        <h3 class="title-medium-dark size-md mb-none">
                            @if(!empty($post->name))
                            <a href="{{ route('post-details',$post ->slug)}}">{{ $post->name }} </a>
                            @else
                            <a href="{{ route('post-details',$post ->slug)}}">{{ $post->title }}</a>
                            @endif
                        </h3>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
            <div class="col-lg-4 col-md-12">
                @if(!empty($postTech))
                <div class="topic-border color-cutty-sark mb-30 width-100">
                    <div class="topic-box-lg color-cutty-sark">C??ng ngh???</div>
                </div>
                @foreach ($postTech as $post)
                @if ($loop->first)
                <div class="img-overlay-70 img-scale-animate position-relative mb-20">
                    <div class="mask-content-sm">
                        <h3 class="title-medium-light">
                            @if(!empty($post->name))
                            <a href="{{ route('post-details',$post ->slug)}}">{{ $post->name }} </a>
                            @else
                            <a href="{{ route('post-details',$post ->slug)}}">{{ $post->title }}</a>
                            @endif
                        </h3>
                    </div>
                    @if(!empty($post->image))
                    <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="thumbnail-image" style="height: 215px;">
                    @else
                    <img src="/frontend/img/news/news19.jpg" alt="{{ $post->title }}" class="thumbnail-image">
                    @endif
                </div>
                @endif
                <div class="media mb-30">
                    <a class="img-opacity-hover" href="{{ route('post-details',$post ->slug)}}">
                        @if(!empty($post->image))
                        <img src="{{ asset($post->image) }}" loading="lazy" alt="{{ $post->title }}" style="width:144px; height:101px;" class="thumbnail-image">
                        @else
                        <img src="/frontend/img/news/news6.jpg" alt="{{ $post->title }}" class="thumbnail-image">
                        @endif
                    </a>
                    <div class="media-body">
                        <h3 class="title-medium-dark size-md mb-none">
                            @if(!empty($post->name))
                            <a href="{{ route('post-details',$post ->slug)}}">{{ $post->name }} </a>
                            @else
                            <a href="{{ route('post-details',$post ->slug)}}">{{ $post->title }}</a>
                            @endif
                        </h3>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
            <div class="col-lg-4 col-md-12">
                @if(!empty($postSociety))
                <div class="topic-border color-cutty-sark mb-30 width-100">
                    <div class="topic-box-lg color-cutty-sark">X?? h???i</div>
                </div>
                @foreach ($postSociety as $post)
                @if ($loop->first)
                <div class="img-overlay-70 img-scale-animate position-relative mb-20">
                    <div class="mask-content-sm">
                        <h3 class="title-medium-light">
                            @if(!empty($post->name))
                            <a href="{{ route('post-details',$post ->slug)}}">{{ $post->name }} </a>
                            @else
                            <a href="{{ route('post-details',$post ->slug)}}">{{ $post->title }}</a>
                            @endif
                        </h3>
                    </div>
                    @if(!empty($post->image))
                    <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="thumbnail-image" style="height: 215px;">
                    @else
                    <img src="/frontend/img/news/news19.jpg" alt="{{ $post->title }}" class="thumbnail-image">
                    @endif
                </div>
                @endif
                <div class="media mb-30">
                    <a class="img-opacity-hover" href="{{ route('post-details',$post ->slug)}}">
                        @if(!empty($post->image))
                        <img src="{{ asset($post->image) }}" loading="lazy" alt="{{ $post->title }}" style="width:144px; height:101px;" class="thumbnail-image">
                        @else
                        <img src="/frontend/img/news/news6.jpg" alt="{{ $post->title }}" class="thumbnail-image">
                        @endif
                    </a>
                    <div class="media-body">
                        <h3 class="title-medium-dark size-md mb-none">
                            @if(!empty($post->name))
                            <a href="{{ route('post-details',$post ->slug)}}">{{ $post->name }} </a>
                            @else
                            <a href="{{ route('post-details',$post ->slug)}}">{{ $post->title }}</a>
                            @endif
                        </h3>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
            <div class="col-lg-4 col-md-12">
                @if(!empty($postCrypto))
                <div class="topic-border color-cutty-sark mb-30 width-100">
                    <div class="topic-box-lg color-cutty-sark">Crypto</div>
                </div>
                @foreach ($postCrypto as $post)
                @if ($loop->first)
                <div class="img-overlay-70 img-scale-animate position-relative mb-20">
                    <div class="mask-content-sm">
                        <h3 class="title-medium-light">
                            @if(!empty($post->name))
                            <a href="{{ route('post-details',$post ->slug)}}">{{ $post->name }} </a>
                            @else
                            <a href="{{ route('post-details',$post ->slug)}}">{{ $post->title }}</a>
                            @endif
                        </h3>
                    </div>
                    @if(!empty($post->image))
                    <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="thumbnail-image" style="height: 215px;">
                    @else
                    <img src="/frontend/img/news/news19.jpg" alt="{{ $post->title }}" class="thumbnail-image">
                    @endif
                </div>
                @endif
                <div class="media mb-30">
                    <a class="img-opacity-hover" href="{{ route('post-details',$post ->slug)}}">
                        @if(!empty($post->image))
                        <img src="{{ asset($post->image) }}" loading="lazy" alt="{{ $post->title }}" style="width:144px; height:101px;" class="thumbnail-image">
                        @else
                        <img src="/frontend/img/news/news6.jpg" alt="{{ $post->title }}" class="thumbnail-image">
                        @endif
                    </a>
                    <div class="media-body">
                        <h3 class="title-medium-dark size-md mb-none">
                            @if(!empty($post->name))
                            <a href="{{ route('post-details',$post ->slug)}}">{{ $post->name }} </a>
                            @else
                            <a href="{{ route('post-details',$post ->slug)}}">{{ $post->title }}</a>
                            @endif
                        </h3>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
        @if((new \Jenssegers\Agent\Agent())->isMobile())
        <div class="sidebar-box image-ads">
            <div class="ne-banner-layout1 text-center">
                @if((new \Jenssegers\Agent\Agent())->platform() == 'AndroidOS' )
                <a href="https://trackmobi.asia/ZnPC5Qu2" target="_blank">
                    <img src="../frontend/img/ads/ads4.gif" alt="ad" class="thumbnail-image">
                </a>
                @elseif((new \Jenssegers\Agent\Agent())->platform() == 'iOS' )
                <a href="https://shorten.asia/UBPExYGq" target="_blank">
                    <img src="../frontend/img/ads/ads4.gif" alt="ad" class="thumbnail-image">
                </a>
                @else
                <a href="https://mobilebanking.mbbank.com.vn:8443/referral/referred.html?referral_code=Z61LQN7ZUV171BDYCZPF" target="_blank">
                    <img src="../frontend/img/ads/ads4.gif" alt="ad" class="thumbnail-image">
                </a>
                @endif
            </div>
        </div>
        <br>
        @endif
        
    </div>

    <div id="banner-ads-bottom">
        <div class="ne-banner-layout1 text-center">
            @if((new \Jenssegers\Agent\Agent())->platform() == 'AndroidOS' )
            <a href="https://trackmobi.asia/ZnPC5Qu2" target="_blank">
                <img src="../frontend/img/ads/ads1.gif" alt="ad" class="thumbnail-image">
            </a>
            @elseif((new \Jenssegers\Agent\Agent())->platform() == 'iOS' )
            <a href="https://shorten.asia/UBPExYGq" target="_blank">
                <img src="../frontend/img/ads/ads1.gif" alt="ad" class="thumbnail-image">
            </a>
            @else
            <a href="https://mobilebanking.mbbank.com.vn:8443/referral/referred.html?referral_code=Z61LQN7ZUV171BDYCZPF" target="_blank">
                <img src="../frontend/img/ads/ads1.gif" alt="ad" class="thumbnail-image">
            </a>
            @endif
        </div>
    </div>
</section>

<section class="bg-accent section-space-less30">
    <div class="container">
    <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="featuredContainer">
                    <div id="data-wrapper">
                        <!-- Results -->
                    </div>
                    <!-- Data Loader -->
                    <div class="row mt-30">
                        <div class="col-12">
                            <div class="loadmore text-center">
                                <a href="#" class="btn-gtf-dtp-50" onclick='loadMore()'>
                                    Xem th??m ...</a>
                            </div>
                        </div>
                    </div>

                    <!-- Data  -->
                </div>
            </div>

            <div class="ne-sidebar sidebar-break-md col-lg-4 col-md-12">
                <div class="sidebar-box image-ads">
                    <div class="ne-banner-layout1 text-center">
                        @if((new \Jenssegers\Agent\Agent())->platform() == 'AndroidOS' )
                        <a href="https://trackmobi.asia/ZnPC5Qu2" target="_blank">
                            <img src="../frontend/img/ads/ads4.gif" alt="ad" class="thumbnail-image">
                        </a>
                        @elseif((new \Jenssegers\Agent\Agent())->platform() == 'iOS' )
                        <a href="https://shorten.asia/UBPExYGq" target="_blank">
                            <img src="../frontend/img/ads/ads4.gif" alt="ad" class="thumbnail-image">
                        </a>
                        @else
                        <a href="https://mobilebanking.mbbank.com.vn:8443/referral/referred.html?referral_code=Z61LQN7ZUV171BDYCZPF" target="_blank">
                            <img src="../frontend/img/ads/ads4.gif" alt="ad" class="thumbnail-image">
                        </a>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>


@endsection
@section('js')
<script>
    window.onscroll = function() {
        myFunction()
    };

    function myFunction() {
        var footerElement = document.getElementById("footerPost");
        var footerPosition = footerElement.offsetTop;

        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            if (document.body.scrollTop > 1000 || document.documentElement.scrollTop > 1000) {
                document.getElementById("banner-ads-bottom").style.top = "60px";
                document.getElementById("banner-ads-bottom").style.position = "fixed";
            } else {
                document.getElementById("banner-ads-bottom").style.top = "-60px";
            }
        }else{
            if (document.documentElement.scrollTop > 2200 && document.documentElement.scrollTop < (footerPosition - 900)) {
                document.querySelector(".image-ads").style.position = "fixed";
            } else {
                document.querySelector(".image-ads").style.position = "";
            }
        }
    }
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var lazyloadImages = document.querySelectorAll("img.lazy");
        var lazyloadThrottleTimeout;

        function lazyload() {
            if (lazyloadThrottleTimeout) {
                clearTimeout(lazyloadThrottleTimeout);
            }

            lazyloadThrottleTimeout = setTimeout(function() {
                var scrollTop = window.pageYOffset;
                lazyloadImages.forEach(function(img) {
                    if (img.offsetTop < (window.innerHeight + scrollTop)) {
                        img.src = img.dataset.src;
                        img.classList.remove('lazy');
                    }
                });
                if (lazyloadImages.length == 0) {
                    document.removeEventListener("scroll", lazyload);
                    window.removeEventListener("resize", lazyload);
                    window.removeEventListener("orientationChange", lazyload);
                }
            }, 20);
        }

        document.addEventListener("scroll", lazyload);
        window.addEventListener("resize", lazyload);
        window.addEventListener("orientationChange", lazyload);
    });
</script>
@endsection
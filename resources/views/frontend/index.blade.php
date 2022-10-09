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
                                @if(isset($postTop))
                                @foreach($postTop as $post)
                                <div class="img-overlay-70 img-scale-animate mb-30">
                                    <a href="{{ route('post-details',$post ->slug)}}">
                                        @if(isset($post->image))
                                        @if((new \Jenssegers\Agent\Agent())->isMobile())
                                        <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="img-fluid width-100">
                                        @else
                                        <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" style="width:350px; height:506px;" class="img-fluid">
                                        @endif
                                        @else
                                        <img src="frontend/img/news/news5.jpg" alt="news" class="img-fluid width-100">
                                        @endif
                                    </a>
                                    <div class="mask-content-lg">
                                        <h2 class="title-medium-light size-lg">
                                            @if(isset($post->name))
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
                                @if(isset($post_new))
                                @foreach($post_new as $post)
                                <div class="media mb-30">
                                    <a class="width38-lg width40-md img-opacity-hover" href="{{ route('post-details',$post ->slug)}}">
                                        @if(isset($post->image))
                                        <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" style="width:144px; height:101px;" class="img-fluid">
                                        @else
                                        <img src="frontend/img/news/news6.jpg" alt="{{ $post->title }}" class="img-fluid">
                                        @endif
                                    </a>
                                    <div class="media-body">
                                        <div class="post-date-dark">
                                            <ul>
                                                <li>
                                                    <span>
                                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                                    </span>{{ \Carbon\Carbon::parse($post->updated_at)->format('d/m/Y') }}
                                                </li>
                                            </ul>
                                        </div>
                                        <h3 class="title-medium-dark size-md mb-none">
                                            @if(isset($post->name))
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
                            <img src="../frontend/img/ads/ads6.jpg" alt="ad" class="img-fluid">
                        </a>
                        @elseif((new \Jenssegers\Agent\Agent())->platform() == 'iOS' )
                        <a href="https://shorten.asia/UBPExYGq" target="_blank">
                            <img src="/frontend/img/ads/ads6.jpg" alt="ad" class="img-fluid">
                        </a>
                        @else
                        <a href="https://mobilebanking.mbbank.com.vn:8443/referral/referred.html?referral_code=Z61LQN7ZUV171BDYCZPF" target="_blank">
                            <img src="/frontend/img/ads/ads6.jpg" alt="ad" class="img-fluid">
                        </a>
                        @endif
                    </div>
                </div>
                <div class="newsletter-area bg-primary" style="">
                    <h2 class="title-medium-light size-xl">Tra cứu thông tin doanh nghiệp</p>
                        <form action="{{ route('search') }}" method="GET">
                            <div class="input-group stylish-input-group">
                                <input type="text" name="search" placeholder="Tìm kiếm" class="form-control" value={{old('search')}}>
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
                @if(isset($postBusiness))
                <div class="topic-border color-cutty-sark mb-30 width-100">
                    <div class="topic-box-lg color-cutty-sark">Kinh doanh</div>
                </div>
                @foreach ($postBusiness as $post)
                @if ($loop->first)
                <div class="img-overlay-70 img-scale-animate mb-30">
                    <div class="mask-content-sm">
                        <h3 class="title-medium-light">
                            @if(isset($post->name))
                            <a href="{{ route('post-details',$post ->slug)}}">{{ $post->name }} </a>
                            @else
                            <a href="{{ route('post-details',$post ->slug)}}">{{ $post->title }}</a>
                            @endif
                        </h3>
                    </div>
                    @if(isset($post->image))
                    <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="img-fluid width-100">
                    @else
                    <img src="frontend/img/news/news19.jpg" alt="{{ $post->title }}" class="img-fluid">
                    @endif
                </div>
                @endif
                <div class="media mb-30">
                    <a class="img-opacity-hover" href="{{ route('post-details',$post ->slug)}}">
                        @if(isset($post->image))
                        <img src="{{ asset($post->image) }}" loading="lazy" alt="{{ $post->title }}" style="width:144px; height:101px;" class="img-fluid">
                        @else
                        <img src="frontend/img/news/news6.jpg" alt="{{ $post->title }}" class="img-fluid">
                        @endif
                    </a>
                    <div class="media-body">
                        <h3 class="title-medium-dark size-md mb-none">
                            @if(isset($post->name))
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
                @if(isset($postFinance))
                <div class="topic-border color-cutty-sark mb-30 width-100">
                    <div class="topic-box-lg color-cutty-sark">Tài chính</div>
                </div>
                @foreach ($postFinance as $post)
                @if ($loop->first)
                <div class="img-overlay-70 img-scale-animate mb-30">
                    <div class="mask-content-sm">
                        <h3 class="title-medium-light">
                            @if(isset($post->name))
                            <a href="{{ route('post-details',$post ->slug)}}">{{ $post->name }} </a>
                            @else
                            <a href="{{ route('post-details',$post ->slug)}}">{{ $post->title }}</a>
                            @endif
                        </h3>
                    </div>
                    @if(isset($post->image))
                    <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="img-fluid width-100">
                    @else
                    <img src="frontend/img/news/news19.jpg" alt="{{ $post->title }}" class="img-fluid">
                    @endif
                </div>
                @endif
                <div class="media mb-30">
                    <a class="img-opacity-hover" href="{{ route('post-details',$post ->slug)}}">
                        @if(isset($post->image))
                        <img src="{{ asset($post->image) }}" loading="lazy" alt="{{ $post->title }}" style="width:144px; height:101px;" class="img-fluid">
                        @else
                        <img src="frontend/img/news/news6.jpg" alt="{{ $post->title }}" class="img-fluid">
                        @endif
                    </a>
                    <div class="media-body">
                        <h3 class="title-medium-dark size-md mb-none">
                            @if(isset($post->name))
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
                @if(isset($postLand))
                <div class="topic-border color-cutty-sark mb-30 width-100">
                    <div class="topic-box-lg color-cutty-sark">Bất động sản</div>
                </div>
                @foreach ($postLand as $post)
                @if ($loop->first)
                <div class="img-overlay-70 img-scale-animate mb-30">
                    <div class="mask-content-sm">
                        <h3 class="title-medium-light">
                            @if(isset($post->name))
                            <a href="{{ route('post-details',$post ->slug)}}">{{ $post->name }} </a>
                            @else
                            <a href="{{ route('post-details',$post ->slug)}}">{{ $post->title }}</a>
                            @endif
                        </h3>
                    </div>
                    @if(isset($post->image))
                    <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="img-fluid width-100">
                    @else
                    <img src="frontend/img/news/news19.jpg" alt="{{ $post->title }}" class="img-fluid">
                    @endif
                </div>
                @endif
                <div class="media mb-30">
                    <a class="img-opacity-hover" href="{{ route('post-details',$post ->slug)}}">
                        @if(isset($post->image))
                        <img src="{{ asset($post->image) }}" loading="lazy" alt="{{ $post->title }}" style="width:144px; height:101px;" class="img-fluid">
                        @else
                        <img src="frontend/img/news/news6.jpg" alt="{{ $post->title }}" class="img-fluid">
                        @endif
                    </a>
                    <div class="media-body">
                        <h3 class="title-medium-dark size-md mb-none">
                            @if(isset($post->name))
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
                @if(isset($postTech))
                <div class="topic-border color-cutty-sark mb-30 width-100">
                    <div class="topic-box-lg color-cutty-sark">Công nghệ</div>
                </div>
                @foreach ($postTech as $post)
                @if ($loop->first)
                <div class="img-overlay-70 img-scale-animate mb-30">
                    <div class="mask-content-sm">
                        <h3 class="title-medium-light">
                            @if(isset($post->name))
                            <a href="{{ route('post-details',$post ->slug)}}">{{ $post->name }} </a>
                            @else
                            <a href="{{ route('post-details',$post ->slug)}}">{{ $post->title }}</a>
                            @endif
                        </h3>
                    </div>
                    @if(isset($post->image))
                    <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="img-fluid width-100">
                    @else
                    <img src="frontend/img/news/news19.jpg" alt="{{ $post->title }}" class="img-fluid">
                    @endif
                </div>
                @endif
                <div class="media mb-30">
                    <a class="img-opacity-hover" href="{{ route('post-details',$post ->slug)}}">
                        @if(isset($post->image))
                        <img src="{{ asset($post->image) }}" loading="lazy" alt="{{ $post->title }}" style="width:144px; height:101px;" class="img-fluid">
                        @else
                        <img src="frontend/img/news/news6.jpg" alt="{{ $post->title }}" class="img-fluid">
                        @endif
                    </a>
                    <div class="media-body">
                        <h3 class="title-medium-dark size-md mb-none">
                            @if(isset($post->name))
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
                @if(isset($postSociety))
                <div class="topic-border color-cutty-sark mb-30 width-100">
                    <div class="topic-box-lg color-cutty-sark">Xã hội</div>
                </div>
                @foreach ($postSociety as $post)
                @if ($loop->first)
                <div class="img-overlay-70 img-scale-animate mb-30">
                    <div class="mask-content-sm">
                        <h3 class="title-medium-light">
                            @if(isset($post->name))
                            <a href="{{ route('post-details',$post ->slug)}}">{{ $post->name }} </a>
                            @else
                            <a href="{{ route('post-details',$post ->slug)}}">{{ $post->title }}</a>
                            @endif
                        </h3>
                    </div>
                    @if(isset($post->image))
                    <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="img-fluid width-100">
                    @else
                    <img src="frontend/img/news/news19.jpg" alt="{{ $post->title }}" class="img-fluid">
                    @endif
                </div>
                @endif
                <div class="media mb-30">
                    <a class="img-opacity-hover" href="{{ route('post-details',$post ->slug)}}">
                        @if(isset($post->image))
                        <img src="{{ asset($post->image) }}" loading="lazy" alt="{{ $post->title }}" style="width:144px; height:101px;" class="img-fluid">
                        @else
                        <img src="frontend/img/news/news6.jpg" alt="{{ $post->title }}" class="img-fluid">
                        @endif
                    </a>
                    <div class="media-body">
                        <h3 class="title-medium-dark size-md mb-none">
                            @if(isset($post->name))
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
                @if(isset($postCrypto))
                <div class="topic-border color-cutty-sark mb-30 width-100">
                    <div class="topic-box-lg color-cutty-sark">Blockchain</div>
                </div>
                @foreach ($postCrypto as $post)
                @if ($loop->first)
                <div class="img-overlay-70 img-scale-animate mb-30">
                    <div class="mask-content-sm">
                        <h3 class="title-medium-light">
                            @if(isset($post->name))
                            <a href="{{ route('post-details',$post ->slug)}}">{{ $post->name }} </a>
                            @else
                            <a href="{{ route('post-details',$post ->slug)}}">{{ $post->title }}</a>
                            @endif
                        </h3>
                    </div>
                    @if(isset($post->image))
                    <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="img-fluid width-100">
                    @else
                    <img src="frontend/img/news/news19.jpg" alt="{{ $post->title }}" class="img-fluid">
                    @endif
                </div>
                @endif
                <div class="media mb-30">
                    <a class="img-opacity-hover" href="{{ route('post-details',$post ->slug)}}">
                        @if(isset($post->image))
                        <img src="{{ asset($post->image) }}" loading="lazy" alt="{{ $post->title }}" style="width:144px; height:101px;" class="img-fluid">
                        @else
                        <img src="frontend/img/news/news6.jpg" alt="{{ $post->title }}" class="img-fluid">
                        @endif
                    </a>
                    <div class="media-body">
                        <h3 class="title-medium-dark size-md mb-none">
                            @if(isset($post->name))
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
                    <img src="../frontend/img/ads/ads4.gif" alt="ad" class="img-fluid">
                </a>
                @elseif((new \Jenssegers\Agent\Agent())->platform() == 'iOS' )
                <a href="https://shorten.asia/UBPExYGq" target="_blank">
                    <img src="../frontend/img/ads/ads4.gif" alt="ad" class="img-fluid">
                </a>
                @else
                <a href="https://mobilebanking.mbbank.com.vn:8443/referral/referred.html?referral_code=Z61LQN7ZUV171BDYCZPF" target="_blank">
                    <img src="../frontend/img/ads/ads4.gif" alt="ad" class="img-fluid">
                </a>
                @endif
            </div>
        </div>
        <br>
        @endif
        @if((new \Jenssegers\Agent\Agent())->isDesktop())
        <div class="row">
            <div class="col-12">
                <div class="ne-banner-layout1 mb-50 mt-20-r text-center">
                    @if((new \Jenssegers\Agent\Agent())->platform() == 'AndroidOS' )
                    <a href="https://trackmobi.asia/ZnPC5Qu2" target="_blank">
                        <img src="../frontend/img/ads/ads1.gif" alt="ad" class="img-fluid">
                    </a>
                    @elseif((new \Jenssegers\Agent\Agent())->platform() == 'iOS' )
                    <a href="https://shorten.asia/UBPExYGq" target="_blank">
                        <img src="../frontend/img/ads/ads1.gif" alt="ad" class="img-fluid">
                    </a>
                    @else
                    <a href="https://mobilebanking.mbbank.com.vn:8443/referral/referred.html?referral_code=Z61LQN7ZUV171BDYCZPF" target="_blank">
                        <img src="../frontend/img/ads/ads1.gif" alt="ad" class="img-fluid">
                    </a>
                    @endif
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
<!-- Latest News Area End Here -->
<!-- More News Area Start Here -->
<section class="bg-accent section-space-less30">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="featuredContainer">
                    <div id="data-wrapper">
                        <!-- Results -->
                    </div>
                    <!-- Data Loader -->
                    <div class="auto-load text-center">
                        <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="60" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                            <path fill="#000" d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                                <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s" from="0 50 50" to="360 50 50" repeatCount="indefinite" />
                            </path>
                        </svg>
                    </div>
                    <!-- Data  -->
                </div>
            </div>

            <div class="ne-sidebar sidebar-break-md col-lg-4 col-md-12">
                <div class="sidebar-box image-ads">
                    <div class="ne-banner-layout1 text-center">
                        @if((new \Jenssegers\Agent\Agent())->platform() == 'AndroidOS' )
                        <a href="https://trackmobi.asia/ZnPC5Qu2" target="_blank">
                            <img src="../frontend/img/ads/ads4.gif" alt="ad" class="img-fluid">
                        </a>
                        @elseif((new \Jenssegers\Agent\Agent())->platform() == 'iOS' )
                        <a href="https://shorten.asia/UBPExYGq" target="_blank">
                            <img src="../frontend/img/ads/ads4.gif" alt="ad" class="img-fluid">
                        </a>
                        @else
                        <a href="https://mobilebanking.mbbank.com.vn:8443/referral/referred.html?referral_code=Z61LQN7ZUV171BDYCZPF" target="_blank">
                            <img src="../frontend/img/ads/ads4.gif" alt="ad" class="img-fluid">
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
                <img src="../frontend/img/ads/ads1.gif" alt="ad" class="img-fluid">
            </a>
            @elseif((new \Jenssegers\Agent\Agent())->platform() == 'iOS' )
            <a href="https://shorten.asia/UBPExYGq" target="_blank">
                <img src="../frontend/img/ads/ads1.gif" alt="ad" class="img-fluid">
            </a>
            @else
            <a href="https://mobilebanking.mbbank.com.vn:8443/referral/referred.html?referral_code=Z61LQN7ZUV171BDYCZPF" target="_blank">
                <img src="../frontend/img/ads/ads1.gif" alt="ad" class="img-fluid">
            </a>
            @endif
        </div>
    </div>
</section>
<!-- More News Area End Here -->

@endsection
@section('js')
<script>
    window.onscroll = function() {
        myFunction()
    };

    function myFunction() {
        if (!/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            var footerElement = document.getElementById("footerPost");
            var footerPosition = footerElement.offsetTop;
            if (document.documentElement.scrollTop > 2200 && document.documentElement.scrollTop < (footerPosition - 900)) {
                document.querySelector(".image-ads").style.position = "fixed";
            } else {
                document.querySelector(".image-ads").style.position = "";
            }
        }
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            if (document.body.scrollTop > 1000 || document.documentElement.scrollTop > 1000) {
                document.getElementById("banner-ads-bottom").style.top = "60px";
                document.getElementById("banner-ads-bottom").style.position = "fixed";
            } else {
                document.getElementById("banner-ads-bottom").style.top = "-60px";
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    var ENDPOINT = "{{ url('/') }}";
    var page = 1;
    infinteLoadMore(page);
    $(window).scroll(function() {
        if ($(window).scrollTop() >  $(document).height() - $(window).height() - 250) {
            page++;
            infinteLoadMore(page);
        }
    });

    function infinteLoadMore(page) {
        $.ajax({
                url: ENDPOINT + "/?page=" + page,
                datatype: "html",
                type: "get",
                beforeSend: function() {
                    $('.auto-load').show();
                }
            })
            .done(function(response) {
                if (response.length == 0) {
                    $('.auto-load').html("We don't have more data to display :(");
                    return;
                }
                $('.auto-load').hide();
                $("#data-wrapper").append(response);
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log('Server error occured');
            });
    }
</script>
@endsection
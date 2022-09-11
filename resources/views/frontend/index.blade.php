@extends('layouts.frontend')
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
                                    <div class="img-overlay-70 img-scale-animate mb-30">
                                        <a href="single-news-1.html">
                                            <img src="frontend/img/news/news5.jpg" alt="news" class="img-fluid width-100">
                                        </a>
                                        <div class="mask-content-lg">
                                            <div class="post-date-light">
                                                <ul>
                                                    <li>
                                                        <span>by</span>
                                                        <a href="single-news-1.html">Adams</a>
                                                    </li>
                                                    <li>
                                                        <span>
                                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                                        </span>March 22, 2017</li>
                                                </ul>
                                            </div>
                                            <h2 class="title-medium-light size-lg">
                                                <a href="single-news-1.html">Government launches are inquiry into tainted ...</a>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="media mb-30">
                                        <a class="width38-lg width40-md img-opacity-hover" href="single-news-1.html">
                                            <img src="frontend/img/news/news6.jpg" alt="news" class="img-fluid">
                                        </a>
                                        <div class="media-body">
                                            <div class="post-date-dark">
                                                <ul>
                                                    <li>
                                                        <span>
                                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                                        </span>February 10, 2017</li>
                                                </ul>
                                            </div>
                                            <h3 class="title-medium-dark size-md mb-none">
                                                <a href="single-news-2.html">Blog post look better they are with a featured.</a>
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="media mb-30">
                                        <a class="width38-lg width40-md img-opacity-hover" href="single-news-2.html">
                                            <img src="frontend/img/news/news7.jpg" alt="news" class="img-fluid">
                                        </a>
                                        <div class="media-body">
                                            <div class="post-date-dark">
                                                <ul>
                                                    <li>
                                                        <span>
                                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                                        </span>January 10, 2017</li>
                                                </ul>
                                            </div>
                                            <h3 class="title-medium-dark size-md mb-none">
                                                <a href="single-news-3.html">UAE athlete dies after inden London training ground.</a>
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="media mb-30">
                                        <a class="width38-lg width40-md img-opacity-hover" href="single-news-3.html">
                                            <img src="frontend/img/news/news8.jpg" alt="news" class="img-fluid">
                                        </a>
                                        <div class="media-body">
                                            <div class="post-date-dark">
                                                <ul>
                                                    <li>
                                                        <span>
                                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                                        </span>December 15, 2016</li>
                                                </ul>
                                            </div>
                                            <h3 class="title-medium-dark size-md mb-none">
                                                <a href="single-news-1.html">Blog post look better they are with a featured.</a>
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="media mb-30">
                                        <a class="width38-lg width40-md img-opacity-hover" href="single-news-1.html">
                                            <img src="frontend/img/news/news9.jpg" alt="news" class="img-fluid">
                                        </a>
                                        <div class="media-body">
                                            <div class="post-date-dark">
                                                <ul>
                                                    <li>
                                                        <span>
                                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                                        </span>November 23, 2016</li>
                                                </ul>
                                            </div>
                                            <h3 class="title-medium-dark size-md mb-none">
                                                <a href="single-news-2.html">Blog post look better they are with a featured.</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="ne-sidebar sidebar-break-md col-lg-4 col-md-12">

                    <div class="newsletter-area bg-primary" style="">
                        <h2 class="title-medium-light size-xl">Tra cứu thông tin doanh nghiệp</p>
                        <form action="{{ route('search') }}" method="GET" >
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
                  
                    <div class="sidebar-box">
                        <div class="ne-banner-layout1 text-center">
                            <a href="#">
                                <img src="frontend/img/banner/banner3.jpg" alt="ad" class="img-fluid">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="bg-body section-space-less30">
        <div class="container">
        @if((new \Jenssegers\Agent\Agent())->isDesktop())
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
                                    <img src="frontend/img/news/news19.jpg" alt="news" class="img-fluid width-100">
                                </div>
                            @endif
                                <div class="media mb-30">
                                    <a class="img-opacity-hover" href="single-news-3.html">
                                        <img src="frontend/img/news/news20.jpg" alt="news" class="img-fluid">
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
                                    <img src="frontend/img/news/news19.jpg" alt="news" class="img-fluid width-100">
                                </div>
                            @endif
                                <div class="media mb-30">
                                    <a class="img-opacity-hover" href="single-news-3.html">
                                        <img src="frontend/img/news/news20.jpg" alt="news" class="img-fluid">
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
                                    <img src="frontend/img/news/news19.jpg" alt="news" class="img-fluid width-100">
                                </div>
                            @endif
                                <div class="media mb-30">
                                    <a class="img-opacity-hover" href="single-news-3.html">
                                        <img src="frontend/img/news/news20.jpg" alt="news" class="img-fluid">
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
                                    <img src="frontend/img/news/news19.jpg" alt="news" class="img-fluid width-100">
                                </div>
                            @endif
                                <div class="media mb-30">
                                    <a class="img-opacity-hover" href="single-news-3.html">
                                        <img src="frontend/img/news/news20.jpg" alt="news" class="img-fluid">
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
                                    <img src="frontend/img/news/news19.jpg" alt="news" class="img-fluid width-100">
                                </div>
                            @endif
                                <div class="media mb-30">
                                    <a class="img-opacity-hover" href="single-news-3.html">
                                        <img src="frontend/img/news/news20.jpg" alt="news" class="img-fluid">
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
                                    <img src="frontend/img/news/news19.jpg" alt="news" class="img-fluid width-100">
                                </div>
                            @endif
                                <div class="media mb-30">
                                    <a class="img-opacity-hover" href="single-news-3.html">
                                        <img src="frontend/img/news/news20.jpg" alt="news" class="img-fluid">
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
        @endif
            <div class="row">
                <div class="col-12">
                    <div class="ne-banner-layout1 mb-50 mt-20-r text-center">
                        <a href="#">
                            <img src="frontend/img/ads/ads1.png" alt="ad" class="img-fluid">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest News Area End Here -->
    <!-- More News Area Start Here -->
    <section class="bg-accent section-space-less30">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="ne-isotope">
                        
                        <div class="featuredContainer">
                            @if(isset($posts))
                            @foreach($posts as $post)
                            <div class="row politics">
                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                                    <div class="media media-none--lg mb-30">
                                        <div class="position-relative width-40">
                                            <a href="single-news-1.html" class="img-opacity-hover">
                                                <img src="frontend/img/news/news38.jpg" alt="news" class="img-fluid">
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
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="ne-sidebar sidebar-break-md col-lg-4 col-md-12">
                    <div class="sidebar-box image-ads">
                        <div class="ne-banner-layout1 text-center">
                            <a href="#">
                                <img src="frontend/img/ads/ads4.png" alt="ad" class="img-fluid">
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div id="banner-ads-bottom">
            <div class="ne-banner-layout1 text-center">
                <a href="#">
                    <img src="../frontend/img/ads/ads1.png" alt="ad" class="img-fluid">
                </a>
            </div>
        </div>
    </section>
    <!-- More News Area End Here -->

@endsection
@section('js')
<script>
window.onscroll = function() {myFunction()};
console.log(window.scrollY)
function myFunction() {
    if( !/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
        var footerElement = document.getElementById("footerPost");
        var footerPosition = footerElement.offsetTop;
        if (document.documentElement.scrollTop > 2000 && document.documentElement.scrollTop < (footerPosition- 900) ) {
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
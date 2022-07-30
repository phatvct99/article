@extends('layouts.frontend')
@section ('content')      
<!-- News Info List Area End Here -->
<!-- Breadcrumb Area Start Here -->
<section class="breadcrumbs-area" style="background-image: url('../frontend/img/banner/breadcrumbs-banner.jpg');">
    <div class="container">
        <div class="breadcrumbs-content">
            <h1>Business</h1>
            <ul>
                <li>
                    <a href="index.html">Home</a> -</li>
                <li>
                    <a href="#">Business</a> -</li>
                <li>Single post style_01</li>
            </ul>
        </div>
    </div>
</section>
<!-- Breadcrumb Area End Here -->
<!-- News Details Page Area Start Here -->
<section class="bg-body section-space-less30">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 mb-30">
                <div class="news-details-layout1">
                    @if(isset($posts))
                        @if(isset($posts->image))
                        <div class="position-relative mb-30">
                            <img src="frontend/../frontend/img/news/news177.jpg" alt="news-details" class="img-fluid">
                            <div class="topic-box-top-sm">
                                <div class="topic-box-sm color-cinnabar mb-20">Business</div>
                            </div>
                        </div>
                        @endif
                    <h2 class="title-semibold-dark size-c30">{{$posts->title}}</h2>
                    {{!! $posts->content!!}}
                    <ul class="blog-tags item-inline">
                        <li>Tags</li>
                        <li>
                            <a href="#">#Business</a>
                        </li>
                        <li>
                            <a href="#">#Magazine</a>
                        </li>
                        <li>
                            <a href="#">#Lifestyle</a>
                        </li>
                    </ul>
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
                    <div class="ne-banner-layout1 mb-50 mt-20-r text-center">
                        <a href="#">
                            <img src="../frontend/../frontend/img/banner/banner2.jpg" alt="ad" class="img-fluid">
                        </a>
                    </div>
                    <div class="row no-gutters divider blog-post-slider">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                            <a href="#" class="prev-article">
                                <i class="fa fa-angle-left" aria-hidden="true"></i>Previous article</a>
                            <h3 class="title-medium-dark pr-50">Wonderful Outdoors Experience: Eagle Spotting in Alaska</h3>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-right">
                            <a href="#" class="next-article">Next article
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                            </a>
                            <h3 class="title-medium-dark pl-50">The only thing that overcomes hard luck is hard work</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="ne-sidebar sidebar-break-md col-lg-4 col-md-12">
                <div class="sidebar-box">
                    <div class="ne-banner-layout1 text-center">
                        <a href="#">
                            <img src="../frontend/img/banner/banner3.jpg" alt="ad" class="img-fluid">
                        </a>
                    </div>
                </div>

                <div class="sidebar-box">
                    <div class="topic-border color-cod-gray mb-30">
                        <div class="topic-box-lg color-cod-gray">Most Reviews</div>
                    </div>
                    <div class="position-relative mb30-list bg-body">
                        <div class="topic-box-top-xs">
                            <div class="topic-box-sm color-cod-gray mb-20">Apple</div>
                        </div>
                        <div class="media">
                            <a class="img-opacity-hover" href="single-news-1.html">
                                <img src="../frontend/img/news/news117.jpg" alt="news" class="img-fluid">
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
                                <h3 class="title-medium-dark mb-none">
                                    <a href="single-news-2.html">Can Be Monit roade year with Program.</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="position-relative mb30-list bg-body">
                        <div class="topic-box-top-xs">
                            <div class="topic-box-sm color-cod-gray mb-20">Gadgets</div>
                        </div>
                        <div class="media">
                            <a class="img-opacity-hover" href="single-news-2.html">
                                <img src="../frontend/img/news/news118.jpg" alt="news" class="img-fluid">
                            </a>
                            <div class="media-body">
                                <div class="post-date-dark">
                                    <ul>
                                        <li>
                                            <span>
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                            </span>June 06, 2017</li>
                                    </ul>
                                </div>
                                <h3 class="title-medium-dark mb-none">
                                    <a href="single-news-3.html">Can Be Monit roade year with Program.</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="position-relative mb30-list bg-body">
                        <div class="topic-box-top-xs">
                            <div class="topic-box-sm color-cod-gray mb-20">Software</div>
                        </div>
                        <div class="media">
                            <a class="img-opacity-hover" href="single-news-3.html">
                                <img src="../frontend/img/news/news119.jpg" alt="news" class="img-fluid">
                            </a>
                            <div class="media-body">
                                <div class="post-date-dark">
                                    <ul>
                                        <li>
                                            <span>
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                            </span>August 22, 2017</li>
                                    </ul>
                                </div>
                                <h3 class="title-medium-dark mb-none">
                                    <a href="single-news-1.html">Can Be Monit roade year with Program.</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="position-relative mb30-list bg-body">
                        <div class="topic-box-top-xs">
                            <div class="topic-box-sm color-cod-gray mb-20">Tech</div>
                        </div>
                        <div class="media">
                            <a class="img-opacity-hover" href="single-news-1.html">
                                <img src="../frontend/img/news/news120.jpg" alt="news" class="img-fluid">
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
                                <h3 class="title-medium-dark mb-none">
                                    <a href="single-news-2.html">Can Be Monit roade year with Program.</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="position-relative mb30-list bg-body">
                        <div class="topic-box-top-xs">
                            <div class="topic-box-sm color-cod-gray mb-20">Ipad</div>
                        </div>
                        <div class="media">
                            <a class="img-opacity-hover" href="single-news-1.html">
                                <img src="../frontend/img/news/news121.jpg" alt="news" class="img-fluid">
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
                                <h3 class="title-medium-dark mb-none">
                                    <a href="single-news-2.html">Can Be Monit roade year with Program.</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-box image-ads">
                        <div class="ne-banner-layout1 text-center">
                            <a href="#">
                                <img src="../frontend/../frontend/img/banner/banner3.jpg" alt="ad" class="img-fluid">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
<script>
window.onscroll = function() {myFunction()};

function myFunction() {
  if( !/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    var footerElement = document.getElementById("asd");
    var footerPosition = footerElement.offsetTop;
    if (document.documentElement.scrollTop > 1500 && document.documentElement.scrollTop < (footerPosition- 500) ) {
      document.querySelector(".image-ads").style.position = "fixed";
    } else {
      document.querySelector(".image-ads").style.position = "";
    }
  }
}
</script>
@endsection
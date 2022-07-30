@extends('layouts.frontend')
@section ('content')      
<section class="breadcrumbs-area" style="background-image: url('frontend/img/banner/breadcrumbs-banner.jpg');">
    <div class="container">
        <div class="breadcrumbs-content">
            <h1>Post Style_1</h1>
            <ul>
                <li>
                    <a href="index.html">Home</a> -</li>
                <li>All Posts</li>
            </ul>
        </div>
    </div>
</section>
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
                                <a href="single-news-1.html" class="img-opacity-hover img-overlay-70">
                                    <img src="frontend/img/news/news141.jpg" alt="news" class="img-fluid">
                                </a>
                                <div class="topic-box-top-xs">
                                    <div class="topic-box-sm color-cod-gray mb-20">Adventure</div>
                                </div>
                            </div>
                            <div class="media-body p-mb-none-child media-margin30">
                                <div class="post-date-dark">
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
                                <h3 class="title-semibold-dark size-lg mb-15">
                                    <a href="{{ route('post-details',$post ->id)}}">{{ $post->title }}</a>
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
                            <ul>
                            {{ $posts->links() }}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="ne-sidebar sidebar-break-md col-lg-4 col-md-12">
                <div class="sidebar-box">
                    <div class="ne-banner-layout1 text-center">
                        <a href="#">
                            <img src="frontend/img/banner/banner3.jpg" alt="" class="img-fluid">
                        </a>
                    </div>
                </div>

                <div class="sidebar-box image-ads">
                    <div class="ne-banner-layout1 text-center">
                        <a href="#">
                            <img src="../frontend/img/banner/banner3.jpg" alt="ad" class="img-fluid">
                        </a>
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
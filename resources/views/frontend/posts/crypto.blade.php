@extends('layouts.frontend')
@section ('content')      
<section class="breadcrumbs-area" style="background-image: url('img/banner/breadcrumbs-banner.jpg');">
    <div class="container">
        <div class="breadcrumbs-content">
            <h1>Gallery Style_1</h1>
            <ul>
                <li>
                    <a href="index.html">Home</a> -</li>
                <li>Gallery</li>
            </ul>
        </div>
    </div>
</section>
<!-- Breadcrumb Area End Here -->
<!-- Gallery Page Area Start Here -->
<section class="bg-body section-space-default">
    <div class="container menu-list-wrapper">
        <div class="row zoom-gallery menu-list">
        @if(isset($posts))
        @foreach($posts as $post)
            <div class="col-lg-4 col-md-6 col-sm-6 col-12 menu-item">
                <div class="gallery-layout-1 mb-40 border-bottom pb-10">
                    <div class="popup-icon-hover img-overlay-hover mb-30">
                        <a class="" href="{{ route('post-details',$post ->id)}}">
                            <img src="frontend/img/news/news162.jpg" alt="news" class="width-100 img-fluid">
                        </a>
                    </div>
                    <h3 class="title-semibold-dark size-c22">
                        <a href="{{ route('post-details',$post ->id)}}">{{ $post->title }}</a>
                    </h3>
                </div>
            </div>
        @endforeach
        @endif
            <div class="ne-banner-layout1 text-center">
                <a href="#">
                    <img src="../frontend/img/banner/banner2.jpg" alt="ad" class="img-fluid">
                </a>
            </div>
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
</section>
@endsection
@section('js')
@endsection
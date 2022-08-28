@extends('layouts.frontend')
@section ('content')      

<!-- Breadcrumb Area End Here -->
<!-- Author Post Page Area Start Here -->
<section class="bg-body section-space-less30">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="bg-accent p-35-r mb-50 item-shadow-1">
                    <div class="media-body pt-10 media-margin30">
                        <div class="newsletter-area bg-primary">
                            <h2 class="title-medium-light size-xl pl-30 pr-30">Tra cứu thông tin doanh nghiệp trên toàn quốc!</h2>
                            <p>Nhập mã số thuế, tên công ty, người đại diện</p>
                            <div class="input-group stylish-input-group">
                                <input type="text" placeholder="Tìm kiếm" class="form-control">
                                <span class="input-group-addon">
                                    <button type="submit">
                                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                @if(isset($company))
                @foreach($company as $com)
                    <div class="col-sm-12 col-12">
                        <div class="content-business">
                            <div class="company">
                                <h3 class="title-company">
                                    <a href="{{ route('frontend.business.detail',['tax' => $com->tax, 'slug' => $com->slug])}}">{{$com->name}}</a>
                                </h3>
                                <div>
                                    <span>Người đại diện: {{$com->chairman}}</span>
                                    <br>
                                    <span>Mã số thuế: {{$com->tax}}</span>
                                    <br>
                                    <em>Địa chỉ:</em> 
                                    {{$com->address}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @endif
                </div>
                <div class="row mt-20-r mb-30">
                    <div class="col-sm-6 col-12">
                        <div class="pagination-btn-wrapper text-center--xs mb15--xs">
                        {{ $company->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="ne-sidebar sidebar-break-md col-lg-4 col-md-12">
                <div class="sidebar-box image-ads">
                    <div class="ne-banner-layout1 text-center">
                        <a href="#">
                            <img src="../frontend/img/banner/banner3.jpg" alt="ad" class="img-fluid">
                        </a>
                    </div>
                </div>

                <div class="sidebar-box">
                    <div class="topic-border color-cod-gray mb-25">
                        <div class="topic-box-lg color-cod-gray">Tỉnh thành</div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div id="banner-ads-bottom">
    <div class="ne-banner-layout1 text-center">
        <a href="#">
            <img src="../frontend/img/banner/banner2.jpg" alt="ad" class="img-fluid">
        </a>
    </div>
</div>
</section>

@endsection
@section('js')
<script>
    var $window = $(window);
    $(window).on('scroll', function() {
        $topOffset = $(this).scrollTop();
        console.log($topOffset);
    });
</script>
<script>
window.onscroll = function() {myFunction()};
console.log(window.scrollY)
function myFunction() {
    if( !/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
        var footerElement = document.getElementById("footerPost");
        var footerPosition = footerElement.offsetTop;
        if (document.documentElement.scrollTop > 1500 && document.documentElement.scrollTop < (footerPosition- 500) ) {
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
            document.getElementById("banner-ads-bottom").style.top = "-50px";
        }
    }
}
</script>

@endsection
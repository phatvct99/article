@extends('layouts.frontend')
@section ('seo')
{!! SEOMeta::generate() !!}
{!! OpenGraph::generate() !!}
@endsection
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
                                    @if($com->chairman != NULL)
                                    <span>Người đại diện: {{$com->chairman}}</span>
                                    <br>
                                    @endif
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

            </div>
            <div class="ne-sidebar sidebar-break-md col-lg-4 col-md-12">
                <div class="sidebar-box image-ads">
                    <div class="ne-banner-layout1 text-center">
                        @if((new \Jenssegers\Agent\Agent())->platform() == 'AndroidOS' )
                        <a href="https://trackmobi.asia/ZnPC5Qu2" target="_blank">
                            <img src="/frontend/img/ads/ads4.gif" alt="Đăng kí tài khoản MB bank miễn phí chuyển tiền, chọn số tài khoản số đẹp" class="thumbnail-image" loading="lazy">
                        </a>
                        @elseif((new \Jenssegers\Agent\Agent())->platform() == 'iOS' )
                            <a href="https://shorten.asia/UBPExYGq" target="_blank">
                                <img src="/frontend/img/ads/ads4.gif" alt="Đăng kí tài khoản MB bank miễn phí chuyển tiền, chọn số tài khoản số đẹp" class="thumbnail-image" loading="lazy">
                            </a>
                        @else
                            <a href="https://mobilebanking.mbbank.com.vn:8443/referral/referred.html?referral_code=Z61LQN7ZUV171BDYCZPF" target="_blank">
                                <img src="/frontend/img/ads/ads4.gif" alt="Đăng kí tài khoản MB bank miễn phí chuyển tiền, chọn số tài khoản số đẹp" class="thumbnail-image" loading="lazy">
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
                <img src="/frontend/img/ads/ads1.gif" alt="Đăng kí tài khoản MB bank miễn phí chuyển tiền, chọn số tài khoản số đẹp" class="thumbnail-image" loading="lazy">
            </a>
            @elseif((new \Jenssegers\Agent\Agent())->platform() == 'iOS' )
                <a href="https://shorten.asia/UBPExYGq" target="_blank">
                    <img src="/frontend/img/ads/ads1.gif" alt="Đăng kí tài khoản MB bank miễn phí chuyển tiền, chọn số tài khoản số đẹp" class="thumbnail-image" loading="lazy">
                </a>
            @else
                <a href="https://mobilebanking.mbbank.com.vn:8443/referral/referred.html?referral_code=Z61LQN7ZUV171BDYCZPF" target="_blank">
                    <img src="/frontend/img/ads/ads1.gif" alt="Đăng kí tài khoản MB bank miễn phí chuyển tiền, chọn số tài khoản số đẹp" class="thumbnail-image" loading="lazy">
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
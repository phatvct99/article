@extends('layouts.frontend')
@section ('content')      

<!-- Breadcrumb Area End Here -->
<!-- Author Post Page Area Start Here -->
<section class="bg-body section-space-less30">
    <div class="container">
        <div class="row">
        
            <div class="col-lg-8 col-md-12">
            @if(isset($company))
                <h1>Thông tin doanh nghiệp</h1>
                <div class="bg-accent p-35-r mb-50 item-shadow-1">
                   <div class="company-detail">
                        <ul>
                            <li>
                                <h2>{{$company->name}}</h2>
                            </li>
                            <li>Mã số thuế: {{$company->tax}}</li>
                            <li>Địa chỉ: <a href="https://www.google.com/maps/place/{{$address}}" target="_blank">{{$company->address}}</a></li>
                        </ul>
                   </div>
                </div>
                <div class="bg-accent p-35-r mb-50 item-shadow-1">
                    <div class="company-detail">
                        <ul>
                        <ul>
                            <li>Đại diện pháp luật: <strong>{{$company->chairman}}</strong></li>
                            <li>Điện thoại: {{$company->phone}}</li>
                            <li>Ngày hoạt động: {{$company->date->format('d-m-Y')}}</li>
                            <li>Ngày cấp giấy phép: {{$company->date->format('d-m-Y')}}</li>
                            @if($company->business != NULL)
                            <li>Ngành nghề chính: <a href="">{{$company->business}}</a> </li>
                            @endif
                            @if($company->status != NULL)
                            <li>Trạng thái: {{$company->status}}</li>
                            @endif
                        </ul>
                   </div>
                </div>
                @endif
                <div class="row">
                @if(isset($companyRelate))
                @foreach($companyRelate as $com)
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
            </div>

            <div class="ne-sidebar sidebar-break-md col-lg-4 col-md-12">
                <div class="sidebar-box image-ads">
                    <div class="ne-banner-layout1 text-center">
                        <a href="#">
                            <img src="../frontend/img/ads/ads4.png" alt="ad" class="img-fluid">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div id="banner-ads-bottom">
    <div class="ne-banner-layout1 text-center">
        <a href="#">
            <img src="../frontend/img/ads/ads1.png" alt="ad" class="img-fluid">
        </a>
    </div>
    <br>
</div>

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
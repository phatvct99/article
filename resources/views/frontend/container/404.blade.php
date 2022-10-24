@extends('layouts.frontend')
@section ('content')
<section class="breadcrumbs-area" style="background-image: url('img/banner/breadcrumbs-banner.jpg');">
    <div class="container">
        <div class="breadcrumbs-content">
            <h1>404 Error Page</h1>
            <ul>
                <li>
                    <a href="index.html">Home</a> -
                </li>
                <li>404</li>
            </ul>
        </div>
    </div>
</section>
<section class="bg-primary pt-100 pb-100">
    <div class="container">
        <div class="text-center">
            <img src="frontend/img/404.png" alt="404" class="img-fluid m-auto">
            <h2 class="title-regular-light size-c60 mb-60">Ooops... Error 404</h2>
            <a href="index.html" class="btn-gtf-ltl-64">Go To Home Page</a>
        </div>
    </div>
</section>
@endsection
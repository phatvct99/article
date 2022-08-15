@extends('crawl.layout')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2>{{ $article->title }}</h2>
            <div class="row">
                <div class="col-md-12">
                    <img src="{{ $article->image  }}" class="pull-left img-responsive thumb margin10 img-thumbnail" />
                    <span class="label label-info"><a href="{{ url('admin/crawl/category/'.$article->category_id) }}"></a></span>
                    <em>Source: </em><a class="label label-danger" href="{{ $article->source_link }}" target="_blank"></a>
                    <article>
                        <p>{!! $article->content !!}</p>
                    </article>>
                </div>
            </div>
        </div>
    </div>

@endsection
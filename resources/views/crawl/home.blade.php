@extends('crawl.layout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>Articles</h2>

                @if(count($articles) > 0)

                    @foreach($articles as $article)
                        <div class="row">
                            <div class="col-md-12">
                                @if(!empty($article->image))
                                    <img src="{{ $article->image  }}" class="pull-left img-responsive thumb margin10 img-thumbnail" width="200" />
                                @endif

                                <h4><a href="{{ url('admin/crawl/article-details/' . $article->id) }}">{{ $article->title }}</a></h4>
                                <span class="label label-info"><a href="{{ url('admin/crawl/category/'.$article->category_id) }}"></a></span>

                                @if(!empty($article->excerpt))
                                    <article>
                                        <p>{{ $article->excerpt }}</p>
                                    </article>
                                @endif

                                <em>Source: </em><a class="label label-danger" href="{{ $article->source_link }}" target="_blank"></a>
                                <a class="btn btn-warning pull-right" href="{{ url('admin/crawl/article-details/' . $article->id) }}">READ MORE</a>
                            </div>
                        </div>
                        <hr/>
                    @endforeach

                        @if(isset($articles))
                            <div class="pagination">
                                <?php echo $articles->render();  ?>
                            </div>
                        @endif

                @else
                        <i>No articles found</i>

                @endif
        </div>
    </div>
@endsection
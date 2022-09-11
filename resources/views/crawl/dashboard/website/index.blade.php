@extends('crawl.layout')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2>Websites</h2>
            @if(session()->has('status'))
                <div class="p-3 mb-2 bg-danger text-white">
                    <center>{{ session()->get('status') }}</center>
                </div>
            @endif
            <a href="{{ route('backend.websites.create') }}" class="btn btn-warning pull-right">Add new</a>
            <br>

            @if(count($websites) > 0)

                <table class="table table-bordered">
                    <tr>
                        <td>Title</td>
                        <td>Url</td>
                        <td>Actions</td>
                    </tr>
                    @foreach($websites as $website)
                        <tr>
                            <td>{{ $website->title }}</td>
                            <td><a href="{{ $website->url }}">{{ $website->url }}</a> </td>
                            <td>
                                <a href="{{  route('backend.websites.edit', $website->id) }}"><i class="glyphicon glyphicon-edit">  </i> </a>
                                <a href="{{  route('backend.websites.delete', $website->id) }}"><i class="glyphicon glyphicon-trash"></i> </a>
                            </td>
                        </tr>
                    @endforeach
                </table>

                @if(count($websites) > 0)
                    <div class="pagination">
                        <?php echo $websites->render();  ?>
                    </div>
                @endif

            @else
                <i>No websites found</i>

            @endif
        </div>
    </div>

@endsection
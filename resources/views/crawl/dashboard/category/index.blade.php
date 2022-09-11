@extends('crawl.layout')

@section('content')

    <div class="row">
        <div class="col-md-12">
            @if(session()->has('status'))
                <div class="p-3 mb-2 bg-danger text-white">
                    <center>{{ session()->get('status') }}</center>
                </div>
            @endif
            <h2>Categories</h2>

            <a href="{{ route('backend.categories.create') }}" class="btn btn-warning pull-right">Add new</a>

            @if(count($categories) > 0)

                <table class="table table-bordered">
                    <tr>
                        <td>Title</td>
                        <td>Actions</td>
                    </tr>
                    @foreach($categories as $cat)
                        <tr>
                            <td>{{ $cat->title }}</td>
                            <td>
                                <a href="{{ route('backend.categories.edit', $cat->id)}}"><i class="glyphicon glyphicon-edit"></i> </a>
                                <a href="{{ route('backend.categories.delete', $cat->id)}}"><i class="glyphicon glyphicon-trash"></i> </a>
                            </td>
                        </tr>
                    @endforeach
                </table>

                @if(count($categories) > 0)
                    <div class="pagination">
                        <?php echo $categories->render();  ?>
                    </div>
                @endif

            @else
                <i>No categories found</i>

            @endif
        </div>
    </div>

@endsection
@extends('crawl.layout')

@section('content')

    <div class="row">
        <div class="col-md-12">
            @if(session()->has('status'))
                <div class="p-3 mb-2 bg-danger text-white">
                    <center>{{ session()->get('status') }}</center>
                </div>
            @endif
            <h2>Item Schema</h2>

            <a href="{{ route('backend.item-schema.create') }}" class="btn btn-warning pull-right">Add new</a>

            @if(count($itemSchemas) > 0)

                <table class="table table-bordered">
                    <tr>
                        <td>Title</td>
                        <td>CSS Expression</td>
                        <td>Is Full Url To Article</td>
                        <td>Full content selector</td>
                        <td>Actions</td>
                    </tr>
                    @foreach($itemSchemas as $item)
                        <tr>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->css_expression }}</td>
                            <td>{{ $item->is_full_url==1?"Yes":"No" }}</td>
                            <td>{{ $item->full_content_selector }}</td>
                            <td>
                                <a href="{{ route('backend.item-schema.edit',$item->id) }}"><i class="glyphicon glyphicon-edit"></i> </a>
                                <a href="{{ route('backend.item-schema.delete', $item->id)}}"><i class="glyphicon glyphicon-trash"></i> </a>
                            </td>
                        </tr>
                    @endforeach
                </table>

                @if(count($itemSchemas) > 0)
                    <div class="pagination">
                        <?php echo $itemSchemas->render();  ?>
                    </div>
                @endif

            @else
                <i>No items found</i>

            @endif
        </div>
    </div>

@endsection
@extends('layouts.backend')
@section('content')
<div class="col-lg-12">
   <div class="card">
      @if(session()->has('status'))
      <div class="p-3 mb-2 bg-success text-white">
         <center>{{ session()->get('status') }}</center>
      </div>
      @endif
      <h3 class="card-header">
         Thông tin bài viết
         <td colspan="9"><a href=" {{ route ('backend.posts.create')}}" class="btn btn-outline-light float-right">Thêm mới</a></td>
      </h3>

      <div class="card-body">
         <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
               <thead>
                  <tr class="border">
                     <th class="border">article_id</th>
                     <th class="border">name</th>
                     <th class="border">type_log</th>
                     <th class="border">timestamp_log</th>
                  </tr>
               </thead>
               <tbody>
                  @if (isset($posts))
                  @foreach($posts as $post)
                  <tr>
                     <td>{{ $post->article_id }}</td>
                     <td>{{ $post->name }}</td>
                     <td>
                        @if($post->type_log == 'INSERT' )
                        <span class="badge badge-success">{{ $post->type_log }}</span>
                        @elseif($post->type_log == 'DELETE' )
                        <span class="badge badge-danger">{{ $post->type_log }}</span>
                        @elseif($post->type_log == 'UPDATE' )
                        <span class="badge badge-warning">{{ $post->type_log }}</span>
                        @endif
                     </td>
                     <td>
                        <span class="badge badge-info">{{ $post->timestamp_log }}</span>
                     </td>
                  </tr>
                  @endforeach
                  @endif
               </tbody>
            </table>



         </div>
      </div>
   </div>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="{{ URL::asset('backend/vendor/datatables/css/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ URL::asset('backend/vendor/datatables/css/buttons.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ URL::asset('backend/vendor/datatables/css/select.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ URL::asset('backend/vendor/datatables/css/fixedHeader.bootstrap4.css') }}">
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
<script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
@endsection
@extends('layouts.backend')
@section('content')
<div class="col-lg-12">
   <div class="card">
      @if(session()->has('status'))
      <div class="p-3 mb-2 bg-success text-white">
         <center>{{ session()->get('status') }}</center>
      </div>
      @endif
      <div class="alert alert-success" style="display: none"></div>
      <h3 class="card-header">
         Thông tin bài viết
         <td colspan="9"><a href=" {{ route ('backend.posts.create')}}" class="btn btn-outline-light float-right">Thêm mới</a></td>
      </h3>

      <div class="card-body">
         <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered second" style="width:100%">
               <thead>
                  <tr class="border">
                     <th class="border">Image</th>
                     <th class="border">Tên bài viết</th>
                     <th class="border">View</th>
                     <th class="border">Loại</th>
                     <th class="border">Hot</th>
                     <th class="border">Status</th>
                     <th class="border">Status2</th>
                     <th class="border">Diff</th>
                     <th class="border"></th>
                  </tr>
               </thead>
              
                  @if (isset($posts))
                  @foreach($posts as $post)
                  <tr data-id="{{ $post->id }}">
                     <td>
                        @if(!empty($post->image))
                        <div class="m-r-10"><img src="{{ asset($post->image) }}" alt="" class="" width="60" height="45"></div>
                        @else
                        <span class="badge badge-light">No Image</span>
                        @endif
                     </td>
                     <td>{{ $post->name }}</td>
                     <td>{{ $post->total_view }}</td>
                     <td><span class="badge badge-info">{{ $post->title }}</span></td>
                     <td>
                        @if($post->hot == 0 )
                        <span class="badge badge-warning">Bình thường</span>
                        @else
                        <span class="badge badge-danger">Nổi bật</span>
                        @endif
                     </td>
                     <td>
                        @if($post->status == 0 )
                        <span class="badge badge-dark">Chưa kích hoạt</span>
                        @else
                        <span class="badge badge-success">Kích hoạt</span>
                        @endif
                     </td>

                     <td>
                        <select class="item_schema" data-id="{{ $post->id }}" data-original-schema="{{$post->status}}">
                           <option value="1" {{ old('status', $post->status) == 1 ? 'selected' : '' }}>Kích hoạt</option>
                           <option value="0" {{ old('status', $post->status) == 0 ? 'selected' : '' }}>Chưa kích hoạt</option>
                        </select>
                        <button type="button" class="btn btn-info btn-sm btn-apply" style="display: none">Apply</button>
                     </td>

                     <td>
                        <div class="btn-group ml-auto">
                           <button class="btn btn-sm btn-outline-light"><a href="{{route ('backend.posts.diff',$post->id) }}"><i class="fas fa-eye"></i></a></button>
                        </div>
                     </td>
                     <td>
                        <div class="btn-group ml-auto">
                           <button class="btn btn-sm btn-outline-light"><a href="{{route ('backend.posts.edit',$post->id) }}"><i class="far fa-edit"></i></a></button>
                           <button class="btn btn-sm btn-outline-light"><a href="{{route('backend.posts.delete',['delete',$post->id])}}"><i class="far fa-trash-alt"></i></a></button>
                        </div>
                     </td>
                  </tr>
                  @endforeach
                  @endif
               
            </table>



         </div>
      </div>
   </div>
</div>
@endsection

@section('css')
<link rel="stylesheet"  href="{{ URL::asset('backend/vendor/datatables/css/dataTables.bootstrap4.css') }}">
<link rel="stylesheet"  href="{{ URL::asset('backend/vendor/datatables/css/buttons.bootstrap4.css') }}">
<link rel="stylesheet"  href="{{ URL::asset('backend/vendor/datatables/css/select.bootstrap4.css') }}">
<link rel="stylesheet"  href="{{ URL::asset('backend/vendor/datatables/css/fixedHeader.bootstrap4.css') }}">

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
<script>
   $(function() {
            $("select.item_schema").change(function() {
               if ($(this).val() != $(this).attr("data-original-schema")) {
                  $(this).siblings('.btn-apply').show();
               }
            });

            $('.btn-apply').click(function() {

               var btn = $(this);

               var tRowId = $(this).parents("tr").attr("data-id");
               var schema_id = $(this).siblings('select').val();
               console.log(schema_id);
               console.log(tRowId);

               $.ajaxSetup({
                  headers: {
                     'X-XSRF-TOKEN': "{{ csrf_token() }}"
                  }
               });

               $.ajax({
                  url: "{{ url('admin/posts/set-status') }}",
                  data: {
                     link_id: tRowId,
                     status: schema_id,
                     _token: "{{ csrf_token() }}",
                     _method: "patch"
                  },
                  method: "post",
                  dataType: "json",
                  success: function(response) {
                     alert(response.msg);

                     btn.hide();
                  }
               });
            });
         });
</script>
@endsection
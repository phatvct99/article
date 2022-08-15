@extends('layouts.backend')
@section('content')
<div class="col-lg-12">
   <div class="card">
      <h3 class="card-header">
         Thông tin bài viết
         <td colspan="9"><a href=" {{ route ('backend.posts.create')}}" class="btn btn-outline-light float-right">Thêm mới</a></td>
      </h3>
      @if(session()->has('status'))
         <div class="p-3 mb-2 bg-danger text-white">
            <center>{{ session()->get('status') }}</center>
         </div>
      @endif
      <div class="card-body p-0">
         <div class="table-responsive">
            <table class="table">
               <thead class="bg-light">
               
                  <tr class="border-0">
                     <th class="border-0">Image</th>
                     <th class="border-0">Tên bài viết</th>
                     <th class="border-0">Diff</th>
                     <th class="border-0" style="width:20px;">Chức năng</th>
                  </tr>
               </thead>
               <tbody>
               @if (isset($posts))
                  @foreach($posts as $post)
                  <tr>
                     <td>
                        <div class="m-r-10"><img src="{{ asset($post->image) }}" alt="" class="" width="60" height="45"></div>
                     </td>
                     <td>{{ $post->title }}</td>
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
               </tbody>
            </table>
            
            <div class="row">
               <div class="col-sm-12 col-md-7">
                  <div class="dataTables_paginate paging_simple_numbers" id="example_paginate">
                     <ul class="pagination">
                     {{$posts->links('vendor.pagination.bootstrap-4')}}
                     </ul>
                  </div>
               </div>
            </div>

         </div>
      </div>
   </div>
</div>
@endsection
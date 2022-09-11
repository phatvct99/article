@extends('layouts.backend')
@section('script')
<script>
   function ChangeToSlug()
         {
               var title, slug;
               //Lấy text từ thẻ input title 
               title = document.getElementById("title").value;
               //Đổi chữ hoa thành chữ thường
               slug = title.toLowerCase();
               //Đổi ký tự có dấu thành không dấu
               slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
               slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
               slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
               slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
               slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
               slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
               slug = slug.replace(/đ/gi, 'd');
               //Xóa các ký tự đặt biệt
               slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
               //Đổi khoảng trắng thành ký tự gạch ngang
               slug = slug.replace(/ /gi, "-");
               //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
               //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
               slug = slug.replace(/\-\-\-\-\-/gi, '-');
               slug = slug.replace(/\-\-\-\-/gi, '-');
               slug = slug.replace(/\-\-\-/gi, '-');
               slug = slug.replace(/\-\-/gi, '-');
               //Xóa các ký tự gạch ngang ở đầu và cuối
               slug = '@' + slug + '@';
               slug = slug.replace(/\@\-|\-\@|\@/gi, '');
               //In slug ra textbox có id “slug”
               document.getElementById('slug').value = slug;
         }
</script>
@endsection
@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
   <div class="card">
      <h3 class="card-header">Thêm mới bài viết</h3>
      @if(session()->has('status'))
         <div class="p-3 mb-2 bg-success text-white">
            <center>{{ session()->get('status') }}</center>
         </div>
      @endif
      <div class="card-body">
      <form id="validationform" action="{{ route('backend.posts.create') }}" method="POST">
            @csrf
            <div class="form-group">
               <label class="col-12 col-sm-3 col-form-label text-sm-right">Loại bài viết</label>
               <select class="selectpicker" name="category_id" data-style="btn-success" id="">
               @if(isset($category))
                  @foreach($category as $categories)
                  <option value="{{ $categories->id }}">{{ $categories->title }}</option>
                  @endforeach
               @endif
               </select>
            </div>
            <div class="form-group row">
               <label class="col-12 col-sm-3 col-form-label text-sm-right">Tên tin tức</label>
               <div class="col-12 col-sm-8 col-lg-6">
                  <input  class="form-control" type="text" name="name" id = "title"  value="{{ old('n_name',isset($posts->name)?$posts->n_name:'')}}" onkeyup="ChangeToSlug();">
                  <p style="color:red">{{ $errors->first('n_name') }}</p>
               </div>
            </div>

            <div class="form-group row">
               <label class="col-12 col-sm-3 col-form-label text-sm-right">Link</label>
               <div class="col-12 col-sm-8 col-lg-6">
                  <input  class="form-control" type="text" name="slug" id ="slug" value="{{ old('slug',isset($posts->slug)?$posts->slug:'')}}">
                  <p style="color:red">{{ $errors->first('slug') }}</p>
               </div>
            </div>

            <div class="form-group row">
               <label class="col-12 col-sm-3 col-form-label text-sm-right">Image</label>
               <div class="col-12 col-sm-8 col-lg-6">
                  <span class="input-group-btn">
                     <a id="lfm" data-input="thumbnail" name="image" style="color:white;" value="{{ old('image',isset($posts->image)?$posts->image:'')}}" data-preview="holder" class="btn btn-primary">
                        <i class="fa fa-picture-o"></i> Choose
                     </a>
                  </span>
                  <input id="thumbnail" class="form-control" type="text" name="image">
               </div>
               <img id="holder" style="margin-top:15px;max-height:100px;">
            </div>
            
        
            <div class="form-group row">
               <label class="col-12 col-sm-3 col-form-label text-sm-right">Title</label>
               <div class="col-12 col-sm-8 col-lg-6">
              
                  <input  type="text" class="form-control"  name="title" value="{{ old('title',isset($posts->title)?$posts->title:'')}}" >
               </div>
            </div>
     
            <div class="form-group row">
               <label class="col-12 col-sm-3 col-form-label text-sm-right">Meta Keyword</label>
               <div class="col-12 col-sm-8 col-lg-6">
                  <input type="text" class="form-control" name="keyword" value="{{ old('keyword',isset($posts->keyword)?$posts->keyword:'')}}">
                  <p style="color:red">{{ $errors->first('keyword') }}</p>
               </div>
            </div>
            <div class="form-group row">
               <label class="col-12 col-sm-3 col-form-label text-sm-right">Meta Description</label>
               <div class="col-12 col-sm-8 col-lg-6">
               <div style="color:red" id="charNum"></div> 
                  <textarea class="form-control" id="excerpt" onkeyup="countChar(this)" name="excerpt" value="{{ old('excerpt',isset($posts->excerpt)?$posts->excerpt:'')}}"></textarea>
                  <p style="color:red">{{ $errors->first('excerpt') }}</p>

               </div>
            </div>
            <div class="form-group row">
               <label class="col-12 col-sm-3 col-form-label text-sm-right">Content</label>
               <div class="col-12 col-sm-8 col-lg-6">
                  <textarea class="form-control" id="content" name="content" value="{{ old('content',isset($posts->content)?$posts->content:'')}}"></textarea>
                  <p style="color:red">{{ $errors->first('excerpt') }} </p>
               </div>
            </div>

            <div class="form-group">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">Nổi bật/Trạng thái</label>
            <select class="selectpicker" name="hot" data-style="btn-warning" id="" >
               <option  value="1"> Nổi bật</option>
               <option  value="0" >Bình thường</option>

            </select>
            <select class="selectpicker" name="status" data-style="btn-info" id="" >
               <option  value="1" >Kích hoạt</option>
               <option  value="0" >Chưa kích hoạt</option>
            </select>

            <div class="form-group row text-right">
               <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                  <button type="submit" class="btn btn-space btn-primary">Submit</button>
                  <button class="btn btn-space btn-secondary">Cancel</button>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>  
@endsection



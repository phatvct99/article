<form id="validationform" action="" method="POST">
   @csrf
      <div class="form-group">
         <label class="col-12 col-sm-3 col-form-label text-sm-right">Loại bài viết</label>
         <select class="selectpicker" name="category_id" data-style="btn-success" id=""  >
            @foreach($category as $categories)
            <option value="{{ $categories->id }}" {{ old('category_id', $posts->category_id) == $categories->id ? 'selected' : '' }} >{{ $categories->title }}</option>
            @endforeach
         </select>
      </div>

      <div class="form-group row">
         <label class="col-12 col-sm-3 col-form-label text-sm-right">Tên tin tức</label>
         <div class="col-12 col-sm-8 col-lg-6">
            <input  class="form-control" type="text" name="name" id = "title" value="{{ old('name',isset($posts->name)?$posts->name:$posts->title)}}" onkeyup="ChangeToSlug(); required">
            <p style="color:red">{{ $errors->first('name') }}</p>
         </div>
      </div>
      <div class="form-group row">
         <label class="col-12 col-sm-3 col-form-label text-sm-right">Link</label>
         <div class="col-12 col-sm-8 col-lg-6">
            <input  class="form-control" type="text" name="slug"  id ="slug" value="{{ old('slug',isset($posts->slug)?$posts->slug:$posts->source_link)}}" required>
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
            <input id="thumbnail" class="form-control" type="text" name="image" value="{{ old('image',isset($posts->image)?$posts->image:'')}}">
            <p style="color:red">{{ $errors->first('image') }}</p>
         </div>
         <img id="holder" style="margin-top:15px;max-height:100px;">
      </div>

      <div class="form-group row">
         <label class="col-12 col-sm-3 col-form-label text-sm-right">Title</label>
         <div class="col-12 col-sm-8 col-lg-6">
            <input  type="text" class="form-control"  name="title" value="{{ old('title',isset($posts->title)?$posts->title:'')}}" >
            <p style="color:red">{{ $errors->first('title') }}</p>
         </div>
      </div>

      <div class="form-group row">
         <label class="col-12 col-sm-3 col-form-label text-sm-right">Meta Keywords</label>
         <div class="col-12 col-sm-8 col-lg-6">
            <input type="text" class="form-control" name="keyword" value="{{ old('keyword',isset($posts->keyword)?$posts->keyword:'')}}">
            <p style="color:red">{{ $errors->first('keyword') }}</p>
         </div>
      </div>
      <div class="form-group row">
         <label class="col-12 col-sm-3 col-form-label text-sm-right">Meta Description</label>
         <div class="col-12 col-sm-8 col-lg-6">
         <div style="color:red" id="charNum">Kí tự</div>
               <input class="form-control" id="excerpt" onkeyup="countChar(this)" name="excerpt" value="{{ old('excerpt',isset($posts->excerpt)?$posts->excerpt:'')}}"></input>
               <p style="color:red">{{ $errors->first('excerpt') }}</p>
         </div>
      </div>
      <div class="form-group row">
         <label class="col-12 col-sm-3 col-form-label text-sm-right">Content</label>
         <div class="col-12 col-sm-8 col-lg-6">
            <textarea class="form-control" id="content" name="content" value="{!! old('content',$content)!!}"></textarea>
            <p style="color:red">{{ $errors->first('content') }}</p>
         </div>
      </div>

      <div class="form-group">
      <label class="col-12 col-sm-3 col-form-label text-sm-right">Nổi bật/Trạng thái</label>
      <select class="selectpicker" name="hot" data-style="btn-warning" id="" >
         <option  value="1" {{ old('hot', $posts->hot) == 1 ? 'selected' : '' }}>Nổi bật</option>
         <option  value="0" {{ old('hot', $posts->hot) == 0 ? 'selected' : '' }}>Bình thường</option>
      </select>
      <select class="selectpicker" name="status" data-style="btn-info" id="" >
         <option  value="1" {{ old('status', $posts->status) == 1 ? 'selected' : '' }}>Kích hoạt</option>
         <option  value="0" {{ old('status', $posts->status) == 0 ? 'selected' : '' }}>Chưa kích hoạt</option>      
      </select>

      <div class="form-group row text-right">
         <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
            <button type="submit" class="btn btn-space btn-primary">Submit</button>
            <button class="btn btn-space btn-secondary">Cancel</button>
         </div>
      </div>
</form>
<div class="form-group row">
   <div class="col-12 col-sm-8 col-lg-6">
      <div class="content-demo">
      {!! old('content',$content)!!}
      </div>
   </div>
   </div>
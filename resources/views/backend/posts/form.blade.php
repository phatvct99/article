<form id="validationform" action="" method="POST" enctype="multipart-form-data">
{{ csrf_field() }}
            <div class="form-group">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">Loại bài viết</label>
            <select class="selectpicker" name="category_id" data-style="btn-success" id=""  >
               <option value="1" {{ old('category_id', $posts->category_id) == 1 ? 'selected' : '' }}>Tin tức phong thủy</option>
               <option value="2" {{ old('category_id', $posts->category_id) == 2 ? 'selected' : '' }}>Tin tức sim số đẹp</option>
            </select>

            <div class="form-group row">
               <label class="col-12 col-sm-3 col-form-label text-sm-right">Tên tin tức</label>
               <div class="col-12 col-sm-8 col-lg-6">
                  <input  class="form-control" type="text" name="n_name" id = "title" value="{{ old('n_name',isset($posts->n_name)?$posts->n_name:'')}}">
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
                  <input  type="text" class="form-control"  name="title" value="{{ old('title',isset($posts->title)?$posts->title:'')}}">
               </div>
            </div>
     
            <div class="form-group row">
               <label class="col-12 col-sm-3 col-form-label text-sm-right">Meta Keywords</label>
               <div class="col-12 col-sm-8 col-lg-6">
                  <input type="text" class="form-control" name="n_title_seo" value="{{ old('n_title_seo',isset($posts->n_title_seo)?$posts->n_title_seo:'')}}">
                  <p style="color:red">{{ $errors->first('n_title_seo') }}</p>
               </div>
            </div>
            <div class="form-group row">
               <label class="col-12 col-sm-3 col-form-label text-sm-right">Meta Description</label>
               <div class="col-12 col-sm-8 col-lg-6">
               <div style="color:red" id="charNum">Kí tự</div>
                  <input type = "text" class="form-control" id="" onkeyup="countChar(this)" name="excerpt" value="{{ old('excerpt',$posts->excerpt) }}">
                  <p style="color:red">{{ $errors->first('excerpt') }}</p>

               </div>
            </div>
            <div class="form-group row">
               <label class="col-12 col-sm-3 col-form-label text-sm-right">Content</label>
               <div class="col-12 col-sm-8 col-lg-6">
                  <textarea class="form-control" id="content" name="content" value="{!! old('content',$posts->content)!!}"></textarea>
                  <p style="color:red">{{ $errors->first('content') }}</p>

               </div>
            </div>

            <div class="form-group">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">Trạng thái/ Nổi bật</label>
            <select class="selectpicker" name="n_hot" data-style="btn-warning" id="" >
               <option  value="1" {{ old('hot', $posts->hot) == 0 ? 'selected' : '' }}>Nổi bật</option>
               <option  value="0" {{ old('hot', $posts->hot) == 0 ? 'selected' : '' }}>Bình thường</option>
          
            </select>
            <select class="selectpicker" name="n_active" data-style="btn-info" id="" >
               <option  value="1" {{ old('active', $posts->active) == 1 ? 'selected' : '' }}>Hiển thị</option>
               <option  value="0" {{ old('active', $posts->active) == 0 ? 'selected' : '' }}>Tạm ẩn</option>      
            </select>

            <div class="form-group row text-right">
               <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                  <button type="submit" class="btn btn-space btn-primary">Submit</button>
                  <button class="btn btn-space btn-secondary">Cancel</button>
               </div>
            </div>
         </form>
         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="content-demo">
            {!! old('content',$posts->content)!!}
            </div>
         </div>
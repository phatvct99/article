@extends('layouts.backend')

@section('content')

<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
	<div class="card">
		<h3 class="card-header">Download image</h3>

		@if(session()->has('status'))
		<div class="p-3 mb-2 bg-success text-white">
			<center>{{ session()->get('status') }}</center>
		</div>
		@endif

		<div class="card-body">
			<form method="post" action="" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label class="col-12 col-sm-3 col-form-label text-sm-right">Loại bài viết</label>
					<select class="selectpicker" name="category" data-style="btn-success" id="">
						@if(isset($category))
						@foreach($category as $categories)
						<option value="{{ $categories->id }}">{{ $categories->title }}</option>
						@endforeach
						@endif
					</select>
				</div>
				<div class="form-group row">
					<label class="col-12 col-sm-3 col-form-label text-sm-right">Name</label>
					<div class="col-12 col-sm-8 col-lg-6">
						<input class="form-control" type="text" name="name" required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-12 col-sm-3 col-form-label text-sm-right">URL</label>
					<div class="col-12 col-sm-8 col-lg-6">
						<input class="form-control" type="text" name="path" required>
					</div>
				</div>
				<div class="form-group row text-right">
					<div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
						<button type="submit" class="btn btn-space btn-primary">Create</button>
					</div>
				</div>

			</form>
		</div>
	</div>
</div>
@endsection
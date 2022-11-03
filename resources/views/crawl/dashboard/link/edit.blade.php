@extends('layouts.backend')

@section('content')

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h3 class="card-header">Add Link</h3>

            @if(session('error')!='')
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-body">
                <form method="post" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Url</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input class="form-control" type="text" name="url"  value="{{ $link->url }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Main Filter Selector</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input class="form-control" type="text" name="main_filter_selector"  value="{{ $link->main_filter_selector }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Website</label>
                        <select name="website_id" class="selectpicker" data-style="btn-success">
                            <option value="">select</option>

                            @foreach($websites as $website)
                                <option value="{{ $website->id }}" {{ $website->id==$link->website_id?"selected":"" }}>{{ $website->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Full content selector</label>
                        <select name="category_id" class="selectpicker" data-style="btn-success">
                            <option value="">select</option>

                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id==$link->category_id?"selected":"" }}>{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row text-right">
                        <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                            <button type="submit" class="btn btn-space btn-primary">Update</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

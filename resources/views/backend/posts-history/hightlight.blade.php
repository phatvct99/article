@extends('layouts.backend')
@section('script')
<script src="{{ URL::asset('backend/htmldiff.js') }}"></script>
<script>

var data = <?php echo json_encode($old,JSON_UNESCAPED_UNICODE); ?>;


var newPost = JSON.parse(JSON.stringify({!!$new!!}));
var oldPost = JSON.parse(JSON.stringify({!!$old!!}));

let newTitleHTML = newPost[0]['title'];
let oldTitleHTML = oldPost[0]['title'];

let newContentHTML = newPost[0]['content'];
let oldContentHTML = oldPost[0]['content'];
// Diff HTML strings
let output = htmldiff(oldContentHTML, newContentHTML);

let outputTitle = htmldiff(oldTitleHTML, newTitleHTML);
// Show HTML diff output as HTML (crazy right?)!
document.getElementById("output").innerHTML = output;

document.getElementById("outputTitle").innerHTML = outputTitle;

</script>
@endsection
@section('content')
<div class="container-fluid dashboard-content">

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h1>DIFF HIGHTLIGHT</h1>
                <div id=""></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Different </h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <h3 for="opacity">Cũ</h3>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <h3 for="opacity">Mới</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="background-color: #ccffd8;">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group" >
                                <label for="opacity">Title</label>
                                <div class="different-hightlight">{!! $old[0] -> title !!}</div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="opacity">Title</label>
                                <div class="different-hightlight" id="outputTitle"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="background-color: #ccffd8;">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group" >
                                <label for="opacity">Content</label>
                                <div class="different-hightlight">{!! $old[0] -> content !!}</div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="opacity">Content</label>
                                <div class="different-hightlight" id="output"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="opacity">Title</label>
                                <input type="text" id="opacity" class="form-control demo" data-opacity=".5" value="#766fa8">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="opacity">Title</label>
                                <input type="text" id="output" class="form-control demo" data-opacity=".5" value="#">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="opacity">Keywords</label>
                                <input type="text" id="opacity" class="form-control demo" data-opacity=".5" value="#">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="opacity">Description</label>
                                <input type="text" id="opacity" class="form-control demo" data-opacity=".5" value="#">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="opacity">Description</label>
                                <input type="text" id="opacity" class="form-control demo" data-opacity=".5" value="#">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="opacity">Opacity</label>
                                <input type="text" id="opacity" class="form-control demo" data-opacity=".5" value="#">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="opacity">Content</label>
                                <input type="text" id="opacity" class="form-control demo" data-opacity=".5" value="#766fa8">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="opacity">Opacity</label>
                                <input type="text" id="opacity" class="form-control demo" data-opacity=".5" value="#766fa8">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  
@endsection
@section('css')
<style>
ins {
    text-decoration: none !important;
    background-color: #5af82b94;
}

del {
    background-color: #ff00009c;
    color: #000000c7;
}
.different-hightlight{
    display: block;
    width: 100%;
    font-size: 15px;
    line-height: 1.42857143;
    color: #0e0c28;
    background-color: #fff;
    background-image: none;
    border: 1px solid #d2d2e4;
    border-radius: 2px;
    padding: 0.375rem 0.75rem;
}
</style>
@endsection



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="row">
        @if(isset($posts))
        @foreach($posts as $post)

        @if(isset($post->name))
        <a href="{{ route('post-details',$post ->slug)}}">{{ $post->name }}</a>
        <br>
        @else
        <a href="{{ route('post-details',$post ->slug)}}">{{ $post->title }}</a>
        <br>
        @endif

        @endforeach
        @endif
    </div>
</body>

</html>
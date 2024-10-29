@extends('layouts.app')
@section('content')
<section class="post">
    <a href="{{route('posts.index')}}">Back</a>
    <img src="{{route('posts.images.show', $post->id)}}" alt="A user posted this image.">
</section>
@endsection

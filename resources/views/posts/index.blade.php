@extends('layouts.app')

@section('content')
    <h2>Most recent posts</h2>
    @if(session()->has('success'))
        <p class="success">{{session()->get('success')}}</p>
    @endif
    <div class="posts-container">
        @foreach($posts as $post)
            <x-post :post="$post"/>
        @endforeach
    </div>
@endsection

@push('head')
    <script src="{{Vite::asset('resources/js/post-like.js')}}"></script>
    <meta name="icon-like" content="{{ Vite::asset('resources/images/icon_like_white_default.svg') }}">
    <meta name="icon-liked" content="{{ Vite::asset('resources/images/icon_like_red_liked.svg') }}">
@endpush

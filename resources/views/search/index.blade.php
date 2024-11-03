@extends('layouts.app')

@section('content')
    <h2>Search for posts</h2>
    <form action="{{route('posts.search')}}" method="get" class="create-post">
        <div class="form-row">
            <label for="cars">Filter cars</label>
            <select name="cars" id="cars">
                <option value="0">All cars</option>
                @foreach($allCars as $car)
                    <option {{$car->id == $cars ? 'selected' : ''}} value="{{$car->id}}">{{$car->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-row">
            <label for="search">Search</label>
            <input type="text" id="search" name="search" value="{{$search}}">
        </div>
        <div class="form-row">
            <input type="submit" value="Search">
        </div>
    </form>

    @if(count($posts) > 0)
        <h3>{{count($posts)}} Search result(s)</h3>
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

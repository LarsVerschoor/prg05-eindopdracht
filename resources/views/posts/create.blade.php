@extends('layouts.app')
@section('content')
    <h2>Create a new post</h2>
    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data" class="create-post">
        @csrf
        @if(session()->has('error'))
            <div class="error">{{session()->get('error')}}</div>
        @endif
        @if(session()->has('success'))
            <div class="success">{{session()->get('success')}}</div>
        @endif
        <div class="form-row">
            <label for="title">Title</label>
            <input type="text" id="title" name="title">
        </div>
        <div class="form-row">
            <label for="description">Description</label>
            <input type="text" id="description" name="description">
        </div>
        <div class="form-row">
            <label for="image">Image</label>
            <input type="file" id="image" name="image">
        </div>
        <div class="form-row">
            <input type="submit" name="submit" value="post">
        </div>
    </form>
@endsection

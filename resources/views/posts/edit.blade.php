
@extends('layouts.app')
@section('content')
    <h2>Edit your post #{{$post->id}}</h2>
    <form action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data" class="create-post">
        @csrf
        @method('PUT')
        @if(session()->has('error'))
            <div class="error">{{session()->get('error')}}</div>
        @endif
        @if(session()->has('success'))
            <div class="success">{{session()->get('success')}}</div>
        @endif
        <div class="form-row">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="{{$post->title}}">
        </div>
        <div class="form-row">
            <label for="description">Description</label>
            <input type="text" id="description" name="description" value="{{$post->description}}">
        </div>
        <div class="form-row">
            <label for="image">Image (If no image is selected, the image will not change)</label>
            <input type="file" id="image" name="image">
        </div>
        <select multiple name="cars[]" id="cars">

            @foreach($cars as $car)
                <option value="{{$car->id}}"{{

                    $post->cars->contains('id', $car->id) ? 'selected' : ''

                }}>{{$car->name}}</option>
            @endforeach
        </select>
        <div class="form-row">
            <input type="submit" name="submit" value="Update">
        </div>
    </form>
@endsection

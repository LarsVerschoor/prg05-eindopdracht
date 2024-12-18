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
            <label for="title">Title <span class="input-error">{{$errors->first('title')}}</span></label>
            <input type="text" id="title" name="title">
        </div>
        <div class="form-row">
            <label for="description">Description <span class="input-error">{{$errors->first('description')}}</span></label>
            <input type="text" id="description" name="description">
        </div>
        <div class="form-row">
            <label for="image">Image <span class="input-error">{{$errors->first('image')}}</span></label>
            <input type="file" id="image" name="image">
        </div>
        <div class="form-row">
            <label for="cars">Cars</label>
            <select multiple name="cars[]" id="cars">
                @foreach($cars as $car)
                    <option value="{{$car->id}}">{{$car->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-row">
            <input type="submit" name="submit" value="post">
        </div>
    </form>
@endsection

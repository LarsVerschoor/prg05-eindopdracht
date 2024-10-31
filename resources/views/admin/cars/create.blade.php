@extends('layouts.app')

@section('content')
    <a href="{{route('cars.index')}}">Back</a>
    <h2>Admin create car</h2>
    <form action="{{route('cars.store')}}" method="post" class="create-post">
        @csrf
        <div class="form-row">
            <label for="name">Name</label>
            <input type="text" id="name" name="name">
        </div>
        <div class="form-row">
            <input type="submit" name="submit" value="post">
        </div>
    </form>
@endsection

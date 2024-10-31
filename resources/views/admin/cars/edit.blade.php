@extends('layouts.app')

@section('content')
    <a href="{{route('cars.index')}}">Back to cars</a>
    <h2>Admin edit car #{{$car->id}}</h2>
    <form action="{{route('cars.update', $car->id)}}" method="post" class="create-post">
        @csrf
        @method('PUT')
        <div class="form-row">
            <label for="name">Name</label>
            <input type="text" id="name" name="name">
        </div>
        <div class="form-row">
            <input type="submit" value="Save">
        </div>
    </form>
@endsection

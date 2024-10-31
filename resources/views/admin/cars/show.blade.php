@extends('layouts.app')

@section('content')
    <a href="{{route('cars.index')}}">Back to cars</a>
    <h2>Admin view car #{{$car->id}}</h2>

    <div>Id: <span>{{$car->id}}</span></div>
    <div>Name: <span>{{$car->name}}</span></div>
    <div>Created at: <span>{{$car->created_at}}</span></div>
    <div>Updated at: <span>{{$car->updated_at}}</span></div>
    <a href="{{route('cars.edit', $car->id)}}">Edit car</a>
@endsection

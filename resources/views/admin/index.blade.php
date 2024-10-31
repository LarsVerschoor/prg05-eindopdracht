@extends('layouts.app')

@section('content')
<h2>Admin dashboard</h2>
<a href="{{route('cars.index')}}">Cars</a>
<a href="{{route('posts.admin.index')}}">Posts</a>
@endsection

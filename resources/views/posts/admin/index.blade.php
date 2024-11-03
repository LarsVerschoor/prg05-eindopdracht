@extends('layouts.app')

@section('content')
    <a href="{{route('admin.index')}}">Back to admin dashboard</a>
    <h2>Admin posts</h2>
    <table>
        <thead>
        <tr>
            <th>id</th>
            <th>user</th>
            <th>title</th>
            <th>description</th>
            <th>cars</th>
            <th>likes</th>
            <th>visibility</th>
        </tr>


        </thead>
        <tfoot></tfoot>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->user->name}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->description}}</td>
                <td>{{$post->cars->map(function ($car) {return $car->name;})->join(', ')}}</td>
                <td>{{count($post->likes)}}</td>
                <td>
                    <form action="{{route('posts.visibility', $post->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="current-visibility" value="{{$post->visibility}}">
                        <input type="submit" data-visible="{{$post->visibility}}" class="visibility" value="{{$post->visibility == 1 ? 'Visible' : 'Invisible'}}">
                    </form>
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>
@endsection

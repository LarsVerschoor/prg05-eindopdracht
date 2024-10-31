@extends('layouts.app')

@section('content')
    <a href="{{route('admin.index')}}">Back to admin dashboard</a>
    <h2>Admin cars</h2>
    <a href="{{route('cars.create')}}">Create a new car</a>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        @foreach($cars as $car)
        <tr>
            <td>{{$car->id}}</td>
            <td><a href="{{route('cars.show', $car->id)}}">{{$car->name}}</a></td>
            <td><a href="{{route('cars.edit', $car->id)}}">Edit car {{$car->id}}</a></td>
            <td>
                <form action="{{route('cars.destroy', $car->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" name="id" value="Delete car">
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
        <tfoot></tfoot>
    </table>

    <script>
        const deleteElement = document.getElementById('delete');
        deleteElement.addEventListener('click')
    </script>
@endsection

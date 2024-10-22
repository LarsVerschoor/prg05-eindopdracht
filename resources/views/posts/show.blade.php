<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<main>
<a href="{{ route('posts.index') }}">Back</a>
    <table>
        <thead>
        <tr>
            <th>title</th>
            <th>description</th>
            <th>user</th>
            <th>image</th>
            <th>visible</th>
            <th>created at</th>
            <th>updated at</th>
            <th>admin delete</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ $post->description }}</td>
                <td>{{ $post->user_id }}</td>
                <td>{{ $post->media_path }}</td>
                <td>{{ $post->visibility }}</td>
                <td>{{ $post->created_at }}</td>
                <td>{{ $post->updated_at }}</td>
                @if ($role === 1)
                <td>
                    <form action="{{route('posts.destroy', $post->id)}}" method="post">
                        @csrf
                        @method("delete")
                        <button type="submit">Delete post</button>
                    </form>
                </td>
                @endif
            </tr>
        </tbody>
    </table>
</main>
</body>
</html>

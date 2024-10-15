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
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ $post->description }}</td>
                <td>{{ $post->user_id }}</td>
                <td>{{ $post->media_path }}</td>
                <td>{{ $post->visible }}</td>
                <td>{{ $post->created_at }}</td>
                <td>{{ $post->updated_at }}</td>
            </tr>
        </tbody>
    </table>
</main>
</body>
</html>

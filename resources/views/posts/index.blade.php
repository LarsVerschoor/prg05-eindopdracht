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
    <table>
        <thead>
        <tr>
            <th>title</th>
            <th>link</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td><a href="{{ route('posts.show', $post->id) }}">View post</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</main>
</body>
</html>

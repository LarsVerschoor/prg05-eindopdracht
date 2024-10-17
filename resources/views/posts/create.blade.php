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
    <h2>Create a new post</h2>
    <form action="{{ route('posts.store') }}" method="post">
        @csrf
        <div class="form-row">
            <label for="title">Title</label>
            <input type="text" id="title" name="title">
        </div>
        <div class="form-row">
            <label for="description">Description</label>
            <input type="text" id="description" name="description">
        </div>
        <div class="form-row">
            <label for="media">Media (photo/video)</label>
            <input type="file" id="media" name="media">
        </div>
        <div class="form-row">
            <input type="submit" name="submit" value="post">
        </div>
    </form>
</main>
</body>
</html>

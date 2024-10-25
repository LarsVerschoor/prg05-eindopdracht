<x-app-layout>
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
                <td><img src="{{ route('posts.images.show', $post->id) }}" alt="image"></td>
                <td>{{ $post->visibility }}</td>
                <td>{{ $post->created_at }}</td>
                <td>{{ $post->updated_at }}</td>
                @if ($post->user_id === $user_id)
                    <td>
                        <a href="{{route('posts.edit', $post->id)}}">Edit post</a>
                    </td>
                @endif
                @if ($post->user_id === $user_id || $role === 1)
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
</x-app-layout>

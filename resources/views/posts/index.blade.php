<x-app-layout>

    <table>
        <thead>
        <tr>
            <th>title</th>
            <th>link</th>
        </tr>
        </thead>
        <tbody>
        @if(session()->has('success'))
            <p class="success">{{session()->get('success')}}</p>
        @endif
        @foreach($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td><a href="{{ route('posts.show', $post->id) }}">View post</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="{{route('posts.create')}}">Create new post</a>

</x-app-layout>

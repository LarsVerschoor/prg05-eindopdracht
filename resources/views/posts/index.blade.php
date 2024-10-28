<x-app-layout>
    <h2>Most recent posts</h2>
    @if(session()->has('success'))
        <p class="success">{{session()->get('success')}}</p>
    @endif
    @foreach($posts as $post)
        <x-post :post="$post"/>
    @endforeach
    <a href="{{route('posts.create')}}">Create new post</a>
</x-app-layout>

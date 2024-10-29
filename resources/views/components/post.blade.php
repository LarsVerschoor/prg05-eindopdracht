<article class="post-preview">
    <div class="post-preview__head">
        <img src="{{Vite::asset('resources/images/icon_profile_white_default.svg')}}" alt="profile picture" class="post-preview__profile-picture">
        <div class="post-preview__username">{{$post->user->name}}</div>
        <a href="" class="post-preview__view-profile">View profile</a>
    </div>
    <div class="post-preview__image-container">
        <img src="{{route('posts.images.show', $post->id)}}" alt="The image attached to this post." class="post-preview__image">
    </div>
    <div class="post-preview__info-container">
        <div class="post-preview__title">{{$post->title}}</div>
        <a href="{{route('posts.show', $post->id)}}" class="post-preview__view-post">View post</a>
    </div>
    <div class="post-preview__footer">
        <div class="post-preview__comments-container">
                <img src="{{Vite::asset('resources/images/icon_comment_white_default.svg')}}" alt="Comments" class="post-preview__comments-icon">
            <div class="post-preview__comments-amount">12</div>
        </div>
<div class="post-preview__likes-container">
    <img
        src="{{Vite::asset('resources/images/icon_like_' . ($post->liked ? 'red_liked' : 'white_default') . '.svg')}}"
        data-unlike-url="{{route('posts.likes.destroy', $post->id)}}"
        data-like-url="{{route('posts.likes.store', $post->id)}}"
        data-post-id="{{$post->id}}"
        alt="Like button"
        class="post-preview__likes-icon post-preview__likes-button"
        data-liked="{{$post->liked ? '1' : '0'}}">
    <div class="post-preview__likes-amount"
    data-post-id="{{$post->id}}"
    data-original-value="{{count($post->likes)}}:{{$post->liked ? 1 : 0}}">
        {{count($post->likes)}}
    </div>
</div>
</div>
</article>
